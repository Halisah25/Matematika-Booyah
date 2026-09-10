<?php

use App\Mail\OrderSuccessMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Midtrans\Config;
use Midtrans\Snap;

// Closure variabel untuk otomasi database agar tidak redeclare error
$ensureDatabaseReady = function () {
    if (config('database.default') === 'sqlite') {
        $path = config('database.connections.sqlite.database');
        if ($path && !file_exists($path) && $path !== ':memory:') {
            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }
            touch($path);
        }
    }

    try {
        Artisan::call('migrate', ['--force' => true]);
    } catch (\Exception $e) {
        // Abaikan error jika migrasi sedang berjalan
    }
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/checkout', function (\Illuminate\Http\Request $request) use ($ensureDatabaseReady) {

    // Pastikan database SQLite dan tabel orders otomatis dibuat jika terhapus
    $ensureDatabaseReady();

    // Set konfigurasi Midtrans mengambil dari config/services.php
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Buat ID transaksi unik
    $orderId = 'MTKBY-' . time();

    // Siapkan data transaksi yang akan dikirim ke Midtrans
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => 49000,
        ],
        'customer_details' => [
            'first_name' => $request->nama,
            'email' => $request->email,
        ],
    ];

    // Minta Snap Token ke Midtrans
    $snapToken = Snap::getSnapToken($params);

    // Simpan data order ke database dengan status awal "pending"
    Order::create([
        'order_id' => $orderId,
        'nama' => $request->nama,
        'email' => $request->email,
        'gross_amount' => 49000,
        'status' => 'pending',
    ]);

    // Simpan ke session
    session([
        'snap_token' => $snapToken,
        'nama' => $request->nama,
        'email' => $request->email,
        'order_id' => $orderId,
    ]);

    return redirect('/payment');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/success', function () {
    return view('success');
});

Route::post('/midtrans/callback', function (\Illuminate\Http\Request $request) use ($ensureDatabaseReady) {

    $ensureDatabaseReady();

    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $payload = json_decode($request->getContent(), true) ?? $request->all();

    \Illuminate\Support\Facades\Log::info('Midtrans callback masuk', $payload);

    $orderId = $payload['order_id'] ?? null;
    $transactionStatus = $payload['transaction_status'] ?? null;
    $paymentType = $payload['payment_type'] ?? null;
    $fraudStatus = $payload['fraud_status'] ?? null;

    // Tentukan status akhir berdasarkan respons dari Midtrans
    $status = 'pending';

    if ($transactionStatus == 'capture') {
        if ($fraudStatus == 'accept') {
            $status = 'success';
        }
    } elseif ($transactionStatus == 'settlement') {
        $status = 'success';
    } elseif ($transactionStatus == 'pending') {
        $status = 'pending';
    } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
        $status = 'failed';
    }

    $order = Order::where('order_id', $orderId)->first();

    if ($order) {
        $wasNotSuccess = $order->status !== 'success';

        $order->update([
            'status' => $status,
            'payment_type' => $paymentType,
        ]);

        if ($wasNotSuccess && $status === 'success') {
            $downloadUrl = url('/download/' . $orderId);

            Mail::to($order->email)->send(
                new OrderSuccessMail($order->nama, $order->email, $orderId, $downloadUrl)
            );
        }
    }

    return response()->json(['message' => 'Notifikasi diterima']);
});

// Halaman download
Route::get('/download/{orderId}', function ($orderId) use ($ensureDatabaseReady) {

    $ensureDatabaseReady();

    $order = Order::where('order_id', $orderId)
        ->where('status', 'success')
        ->first();

    if (!$order) {
        abort(403, 'Akses ditolak. Transaksi tidak ditemukan atau belum lunas.');
    }

    return view('download', ['order' => $order]);
});

// Proses download file per level (Pencarian Fleksibel di public/modules)
Route::get('/download/{orderId}/{level}', function ($orderId, $level) use ($ensureDatabaseReady) {

    $ensureDatabaseReady();

    $order = Order::where('order_id', $orderId)
        ->where('status', 'success')
        ->first();

    if (!$order) {
        abort(403, 'Akses ditolak. Transaksi tidak ditemukan atau belum lunas.');
    }

    $level = strtolower($level);

    if (!in_array($level, ['a', 'b', 'c'])) {
        abort(404, 'Level tidak valid.');
    }

    $dir = public_path('modules');

    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if (preg_match("/level[-_ ]?{$level}\.pdf$/i", $file)) {
                $fullPath = $dir . '/' . $file;
                return response()->download($fullPath, 'Matematika-Booyah-Level-' . strtoupper($level) . '.pdf');
            }
        }
    }

    $standardPath = public_path("modules/level-{$level}.pdf");
    if (file_exists($standardPath)) {
        return response()->download($standardPath, 'Matematika-Booyah-Level-' . strtoupper($level) . '.pdf');
    }

    abort(404, 'File PDF tidak ditemukan di folder public/modules.');
});
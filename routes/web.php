<?php

use App\Mail\OrderSuccessMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Midtrans\Config;
use Midtrans\Snap;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/checkout', function (\Illuminate\Http\Request $request) {

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

Route::post('/midtrans/callback', function (\Illuminate\Http\Request $request) {

    // Set konfigurasi Midtrans mengambil dari config/services.php
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $notif = new \Midtrans\Notification();

    $orderId = $notif->order_id;
    $transactionStatus = $notif->transaction_status;
    $paymentType = $notif->payment_type;
    $fraudStatus = $notif->fraud_status;

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
Route::get('/download/{orderId}', function ($orderId) {

    $order = Order::where('order_id', $orderId)
        ->where('status', 'success')
        ->first();

    if (!$order) {
        abort(403, 'Akses ditolak. Transaksi tidak ditemukan atau belum lunas.');
    }

    return view('download', ['order' => $order]);
});

// Proses download file per level
Route::get('/download/{orderId}/{level}', function ($orderId, $level) {

    $order = Order::where('order_id', $orderId)
        ->where('status', 'success')
        ->first();

    if (!$order) {
        abort(403, 'Akses ditolak. Transaksi tidak ditemukan atau belum lunas.');
    }

    if (!in_array($level, ['a', 'b', 'c'])) {
        abort(404);
    }

    $path = storage_path("app/private/modules/level-{$level}.pdf");

    if (!file_exists($path)) {
        abort(404, 'File tidak ditemukan.');
    }

    return response()->download($path, 'Matematika-Booyah-Level-' . strtoupper($level) . '.pdf');
});
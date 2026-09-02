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

    // Set konfigurasi Midtrans
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');

    // Buat ID transaksi unik (gabungan waktu sekarang + angka acak)
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

    // Simpan ke session biasa (bukan flash), supaya data tidak hilang
    // saat pindah dari /payment ke /success
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

    // Halaman ini hanya menampilkan tampilan sukses.
    // Update status & kirim email sepenuhnya ditangani oleh webhook
    // di /midtrans/callback, supaya lebih akurat dan tidak duplikat.

    return view('success');
});

Route::post('/midtrans/callback', function (\Illuminate\Http\Request $request) {

    // Set konfigurasi Midtrans (sama seperti di checkout)
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');

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
        // Cegah kirim email dobel: hanya kirim jika status SEBELUMNYA
        // belum "success", tapi SEKARANG jadi "success"
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

// Halaman download (menampilkan 3 tombol Level A, B, C)
Route::get('/download/{orderId}', function ($orderId) {

    $order = Order::where('order_id', $orderId)
        ->where('status', 'success')
        ->first();

    if (!$order) {
        abort(403, 'Akses ditolak. Transaksi tidak ditemukan atau belum lunas.');
    }

    return view('download', ['order' => $order]);
});

// Proses download file per level (a/b/c)
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Matematika Booyah!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #FAFAFA; color: #333; line-height: 1.6; }
        .container { max-width: 640px; margin: 0 auto; padding: 0 20px; }

        /* ===== HEADER ===== */
        header {
            background: #fff;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-inner { display: flex; justify-content: space-between; align-items: center; max-width: 640px; margin: 0 auto; padding: 0 20px; }
        .logo { display: flex; align-items: center; gap: 10px; font-weight: bold; font-size: 18px; }
        .logo-icon { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
        .back-link { color: #333; text-decoration: none; font-size: 14px; display: flex; align-items: center; gap: 8px; }

        /* ===== PAGE TITLE ===== */
        .page-title { padding: 26px 0 4px; }
        .page-title h1 { font-size: 22px; font-weight: 800; margin-bottom: 6px; }
        .page-title p { color: #666; font-size: 14px; }

        .card { background: #fff; border: 1px solid #eee; border-radius: 14px; padding: 20px; margin-bottom: 16px; }
        .card h2 { font-size: 15.5px; font-weight: 800; margin-bottom: 14px; }

        /* ===== ORDER SUMMARY ===== */
        .order-item { display: flex; gap: 14px; margin-bottom: 14px; }
        .order-item img { width: 56px; height: 56px; border-radius: 8px; object-fit: cover; border: 1px solid #eee; }
        .order-item-info { flex: 1; }
        .order-item-info h3 { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
        .order-item-info p { font-size: 12.5px; color: #777; }
        .order-item-price { font-weight: 800; font-size: 14px; white-space: nowrap; }

        .order-divider { border: none; border-top: 1px solid #eee; margin: 14px 0; }
        .order-row.total { display: flex; justify-content: space-between; font-weight: 800; font-size: 15px; }
        .order-row.total .amount { color: #E2577A; }

        /* ===== SECURITY NOTES ===== */
        .security-note { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 16px; }
        .security-note:last-child { margin-bottom: 0; }
        .security-note img { width: 24px; height: 24px; object-fit: contain; margin-top: 2px; }
        .security-note strong { display: block; font-size: 13.5px; font-weight: 700; }
        .security-note span { font-size: 12.5px; color: #777; }

        /* ===== SUBMIT BUTTON ===== */
        .btn-pay {
            width: 100%;
            background: #E2577A;
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-pay:hover { background: #d1496c; }
    </style>
</head>
<body>

    <header>
        <div class="header-inner">
            <div class="logo">
                <img src="{{ asset('images/logo_mtk_booyah.jpeg') }}" alt="Matematika Booyah" class="logo-icon">
                Matematika Booyah!
            </div>
            <a href="{{ url('/checkout') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Checkout</a>
        </div>
    </header>

    <div class="container">

        <div class="page-title">
            <h1>Pembayaran</h1>
        </div>

        <div class="card">
            <h2>Ringkasan Pesanan</h2>
            <div class="order-item">
                <img src="{{ asset('images/level-a.png') }}" alt="E-Modul Matematika Booyah">
                <div class="order-item-info">
                    <h3>E-Modul Matematika Booyah</h3>
                    <p>Level A, B, C (Lengkap)</p>
                </div>
                <div class="order-item-price">Rp 49.000</div>
            </div>
            <hr class="order-divider">
            <div class="order-row total"><span>Total Pembayaran</span><span class="amount">Rp 49.000</span></div>
        </div>

        <div class="card">
            <div class="security-note">
                <img src="{{ asset('images/icon-secure.png') }}" alt="Transaksi Aman">
                <div><strong>Transaksi Aman</strong><span>dengan enkripsi SSL</span></div>
            </div>
            <div class="security-note">
                <img src="{{ asset('images/icon-midtrans.png') }}" alt="Diproses oleh Midtrans">
                <div><strong>Diproses oleh</strong><span>Midtrans</span></div>
            </div>
            <div class="security-note">
                <img src="{{ asset('images/icon-card.png') }}" alt="Berbagai metode pembayaran">
                <div><strong>Berbagai metode</strong><span>pembayaran</span></div>
            </div>
        </div>

        <button type="button" onclick="payNow()" class="btn-pay">Bayar Sekarang</button>

    </div>

    <script>
        function payNow() {
            snap.pay('{{ session("snap_token") }}', {
                onSuccess: function(result) {
                    window.location = "{{ url('/success') }}";
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran kamu selesai.");
                },
                onError: function(result) {
                    alert("Pembayaran gagal, coba lagi.");
                },
                onClose: function() {
                    alert("Kamu menutup popup sebelum menyelesaikan pembayaran.");
                }
            });
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Matematika Booyah!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        .page-title { padding: 28px 0 4px; }
        .page-title h1 { font-size: 22px; font-weight: 800; margin-bottom: 6px; }
        .page-title p { color: #666; font-size: 14px; margin-bottom: 14px; }

        .badge-secure {
            background: #DFF3E4;
            color: #2E8B4F;
            font-size: 12.5px;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
        }

        /* ===== FORM CARD ===== */
        .card { background: #fff; border: 1px solid #eee; border-radius: 14px; padding: 22px; margin-bottom: 20px; }
        .card h2 { font-size: 17px; font-weight: 800; margin-bottom: 16px; }

        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 14px; font-weight: 700; margin-bottom: 6px; }
        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
        }
        .form-group input:focus { outline: none; border-color: #E2577A; }
        .form-hint { font-size: 12.5px; color: #888; margin-top: 6px; }

        /* ===== ORDER SUMMARY ===== */
        .order-item { display: flex; gap: 14px; margin-bottom: 16px; }
        .order-item img { width: 64px; height: 64px; border-radius: 8px; object-fit: cover; border: 1px solid #eee; }
        .order-item-info { flex: 1; }
        .order-item-info h3 { font-size: 14.5px; font-weight: 700; margin-bottom: 2px; }
        .order-item-info p { font-size: 13px; color: #777; }
        .order-item-price { font-weight: 800; font-size: 14.5px; white-space: nowrap; }

        .order-divider { border: none; border-top: 1px solid #eee; margin: 16px 0; }

        .order-row { display: flex; justify-content: space-between; font-size: 14px; color: #555; margin-bottom: 8px; }
        .order-row.total { font-weight: 800; color: #111; font-size: 15px; margin-top: 12px; }
        .order-row.total .amount { color: #E2577A; }

        .terms-note {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 12.5px;
            color: #777;
            margin: 16px 0;
        }
        .terms-note a { color: #4A90D9; text-decoration: none; }

        .btn-checkout {
            width: 100%;
            background: #E2577A;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-checkout:hover { background: #d1496c; }
    </style>
</head>
<body>

    <header>
        <div class="header-inner">
            <div class="logo">
                <img src="{{ asset('images/logo_mtk_booyah.jpeg') }}" alt="Matematika Booyah" class="logo-icon">
                Matematika Booyah!
            </div>
            <a href="{{ url('/') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </header>

    <div class="container">

        <div class="page-title">
            <h1>Checkout</h1>
            <p>Lengkapi data berikut untuk melanjutkan pembayaran.</p>
            <span class="badge-secure"><i class="fa-solid fa-lock"></i> Aman &amp; Terpercaya</span>
        </div>

        <form action="#" method="POST">
            @csrf

            <!-- ===== DATA PEMBELI CARD ===== -->
            <div class="card">
                <h2>Data Pembeli</h2>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Bunda Sari" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Contoh: bunda.sari@gmail.com" required>
                    <p class="form-hint">Pastikan email aktif, e-modul akan dikirim ke email ini.</p>
                </div>
            </div>

            <!-- ===== RINGKASAN PESANAN CARD ===== -->
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

                <div class="order-row"><span>Subtotal</span><span>Rp 49.000</span></div>
                <div class="order-row"><span>Biaya Layanan</span><span>Rp 0</span></div>

                <div class="order-row total"><span>Total Pembayaran</span><span class="amount">Rp 49.000</span></div>

                <div class="terms-note">
                    <i class="fa-solid fa-circle-info" style="margin-top:2px;"></i>
                    <span>Dengan melanjutkan, Anda menyetujui <a href="#">Syarat &amp; Ketentuan</a> yang berlaku.</span>
                </div>

                <button type="submit" class="btn-checkout">Lanjut ke Pembayaran</button>
            </div>

        </form>

    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Matematika Booyah!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #FAFAFA; color: #333; line-height: 1.6; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

        /* ===== HEADER ===== */
        header {
            background: #fff;
            padding: 16px 0;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-inner { display: flex; justify-content: space-between; align-items: center; max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        .logo { display: flex; align-items: center; gap: 10px; font-weight: bold; font-size: 18px; }
        .logo-icon { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
        .back-link { color: #333; text-decoration: none; font-size: 14px; display: flex; align-items: center; gap: 8px; font-weight: 600; }

        /* ===== SUCCESS SECTION ===== */
        .success-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 50px 0 60px;
            flex-wrap: wrap;
        }
        .success-left { flex: 1; max-width: 420px; min-width: 280px; }
        .success-right { flex: 1; max-width: 440px; min-width: 280px; text-align: center; }
        .success-right img { width: 100%; max-width: 440px; height: auto; display: block; margin: 0 auto; }

        .icon-wrap { width: 130px; margin: 0 auto 16px; }
        .icon-wrap img { width: 100%; height: auto; display: block; }

        h1 { font-size: 22px; font-weight: 800; margin-bottom: 4px; }
        .subtitle { color: #666; font-size: 14px; margin-bottom: 2px; }
        .product-name { color: #333; font-size: 14px; font-weight: 700; margin-bottom: 20px; }

        .email-box {
            background: #EEF6EF;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 13px;
            margin: 0 auto 20px;
            max-width: 400px;
            text-align: center; /* Disesuaikan ke tengah sesuai figma */
        }
        .email-box .desc { color: #555; margin-bottom: 2px; }
        .email-box .email { font-weight: 800; color: #222; font-size: 15px; margin-bottom: 4px; }
        .email-box .hint { color: #666; font-size: 12px; line-height: 1.4; }

        .btn-download {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            max-width: 400px;
            background: #E2577A;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 auto 10px;
        }
        .btn-download:hover { background: #d1496c; }

        .btn-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            max-width: 400px;
            background: #fff;
            color: #333; /* Warna teks utama lebih gelap netral */
            border: 1px solid #E2577A;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 auto;
        }
        .btn-home:hover { background: #FFF5F7; }

        /* ===== FOOTER BAND ===== */
        .footer-band {
            background: #FEF5DA; /* Menggunakan krem lembut khas figma */
            margin-top: 20px;
            padding: 30px 0;
        }
        .footer-inner {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .help-block { display: flex; align-items: center; gap: 16px; }
        .help-emoji {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }
        .help-emoji img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .help-block strong { display: block; font-size: 16px; font-weight: 800; margin-bottom: 2px; }
        .help-block .contact { font-size: 13.5px; color: #555; line-height: 1.5; }
        .help-block .contact a { color: #E07A2E; font-weight: 700; text-decoration: none; }

        .trust-list { display: flex; flex-direction: column; gap: 14px; }
        .trust-item { display: flex; align-items: center; gap: 12px; }
        .trust-item img { width: 22px; height: 22px; object-fit: contain; }
        .trust-item strong { display: block; font-size: 13.5px; font-weight: 700; color: #222; }
        .trust-item span { font-size: 12px; color: #666; }

        @media (max-width: 768px) {
            .success-section {
                flex-direction: column;
                padding: 30px 0;
            }
            .success-right { order: -1; }
            .footer-inner { flex-direction: column; align-items: flex-start; }
        }
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
        <div class="success-section">

            <!-- ===== LEFT: TEXT & ACTIONS ===== -->
            <div class="success-left" style="text-align: center;">
                <div class="icon-wrap">
                    <img src="{{ asset('images/icon-success-check.png') }}" alt="Pembayaran Berhasil">
                </div>

                <h1>Pembayaran Berhasil!</h1>
                <p class="subtitle">Terima kasih telah membeli</p>
                <p class="product-name">E-Modul Matematika Booyah</p>

                <div class="email-box">
                    <div class="desc">E-modul telah dikirim ke email</div>
                    <div class="email">{{ session('email', 'email@contoh.com') }}</div>
                    <div class="hint">Silahkan cek inbox atau folder spam jika email tidak ditemukan.</div>
                </div>

                <a href="#" class="btn-download"><i class="fa-solid fa-download"></i> Donwload Lagi</a>
                <a href="{{ url('/') }}" class="btn-home"><i class="fa-solid fa-house"></i> Kembali ke Beranda</a>
            </div>

            <!-- ===== RIGHT: ILLUSTRATION ===== -->
            <div class="success-right">
                <img src="{{ asset('images/illustration-success.png') }}" alt="Ilustrasi Ibu dan Anak">
            </div>

        </div>
    </div>

    <!-- ===== FOOTER BAND ===== -->
    <div class="footer-band">
        <div class="footer-inner">

            <div class="help-block">
                <div class="help-emoji"><img src="{{ asset('images/icon-help.png') }}" alt="Bantuan"></div>
                <div>
                    <strong>Perlu bantuan?</strong>
                    <div class="contact">
                        Hubungi kami di WhatsApp <a href="https://wa.me/6281234567890">0812 - 3456 - 7890</a><br>
                        atau email halo@matematikabooyah.com
                    </div>
                </div>
            </div>

            <div class="trust-list">
                <div class="trust-item">
                    <img src="{{ asset('images/icon-secure.png') }}" alt="Transaksi Aman">
                    <div><strong>Transaksi Aman</strong><span>dengan enkripsi SSL</span></div>
                </div>
                <div class="trust-item">
                    <img src="{{ asset('images/icon-midtrans.png') }}" alt="Diproses oleh Midtrans">
                    <div><strong>Diproses oleh</strong><span>Midtrans</span></div>
                </div>
                <div class="trust-item">
                    <img src="{{ asset('images/icon-card.png') }}" alt="Berbagai metode pembayaran">
                    <div><strong>Berbagai metode</strong><span>pembayaran</span></div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
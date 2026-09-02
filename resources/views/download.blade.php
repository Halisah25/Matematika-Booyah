<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download E-Modul - Matematika Booyah!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #FAFAFA; color: #333; line-height: 1.6; }
        .container { max-width: 640px; margin: 0 auto; padding: 0 20px; }

        header {
            background: #fff;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }
        .header-inner { display: flex; justify-content: space-between; align-items: center; max-width: 640px; margin: 0 auto; padding: 0 20px; }
        .logo { display: flex; align-items: center; gap: 10px; font-weight: bold; font-size: 18px; }
        .logo-icon { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }

        .page-title { padding: 28px 0 20px; text-align: center; }
        .page-title h1 { font-size: 22px; font-weight: 800; margin-bottom: 6px; }
        .page-title p { color: #666; font-size: 14px; }

        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 18px 20px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }
        .card-info { display: flex; align-items: center; gap: 14px; }
        .card-icon {
            width: 44px;
            height: 44px;
            background: #FDEBEF;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
            color: #E2577A;
        }
        .card-info h3 { font-size: 15px; font-weight: 700; margin-bottom: 2px; }
        .card-info p { font-size: 12.5px; color: #777; }

        .btn-download {
            background: #E2577A;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13.5px;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
        }
        .btn-download:hover { background: #d1496c; }

        .footer-note {
            text-align: center;
            font-size: 12.5px;
            color: #888;
            margin: 24px 0 40px;
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
        </div>
    </header>

    <div class="container">

        <div class="page-title">
            <h1>Download E-Modul</h1>
            <p>Terima kasih, {{ $order->nama }}! Silakan unduh e-modul kamu di bawah ini.</p>
        </div>

        <div class="card">
            <div class="card-info">
                <div class="card-icon">A</div>
                <div>
                    <h3>E-Modul Level A</h3>
                    <p>Matematika Booyah - Untuk Sekolah Dasar</p>
                </div>
            </div>
            <a href="{{ url('/download/' . $order->order_id . '/a') }}" class="btn-download">
                <i class="fa-solid fa-download"></i> Download
            </a>
        </div>

        <div class="card">
            <div class="card-info">
                <div class="card-icon">B</div>
                <div>
                    <h3>E-Modul Level B</h3>
                    <p>Matematika Booyah - Untuk Sekolah Dasar</p>
                </div>
            </div>
            <a href="{{ url('/download/' . $order->order_id . '/b') }}" class="btn-download">
                <i class="fa-solid fa-download"></i> Download
            </a>
        </div>

        <div class="card">
            <div class="card-info">
                <div class="card-icon">C</div>
                <div>
                    <h3>E-Modul Level C</h3>
                    <p>Matematika Booyah - Untuk Sekolah Dasar</p>
                </div>
            </div>
            <a href="{{ url('/download/' . $order->order_id . '/c') }}" class="btn-download">
                <i class="fa-solid fa-download"></i> Download
            </a>
        </div>

        <p class="footer-note">Order ID: {{ $order->order_id }}</p>

    </div>

</body>
</html>
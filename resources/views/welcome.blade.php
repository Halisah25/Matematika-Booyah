<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matematika Booyah!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #FFF9F0; color: #333; line-height: 1.6; }
        .container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }

        /* ===== HEADER 1 ===== */
        header {
            background: #fff;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .header-inner { display: flex; justify-content: space-between; align-items: center; }
        .logo { display: flex; align-items: center; gap: 10px; font-weight: bold; font-size: 19px; }
        .logo-icon { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; }
        nav ul { display: flex; gap: 28px; list-style: none; }
        nav a { text-decoration: none; color: #333; font-size: 14px; font-weight: 600; }
        .btn-primary { background: #E2577A; color: #fff; border: none; padding: 8px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; }
        .btn-outline { background: #fff; color: #E2577A; border: 2px solid #E14D75; padding: 10px 22px; border-radius: 8px; font-weight: bold; cursor: pointer; text-decoration: none; display: inline-block; font-size: 14px; }

        @media (max-width: 768px) {
            nav { display: none; }
        }

        /* ===== HERO SECTION 2 ===== */
        .hero { background: #FFF9F0; padding: 40px 0 40px; }
        .hero-inner { display: flex; align-items: center; gap: 30px; flex-wrap: wrap; }
        .hero-text { flex: 1; min-width: 320px; max-width: 540px; }

        .badge {
            background: #FBE1A0;
            color: #FF7D20;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 14px;
        }

        .hero-text h1 {
            font-family: 'Suez One', serif;
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 14px;
            line-height: 1.3;
            color: #222;
        }
        .highlight { color: #E2577A; }

        .hero-text p {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
            max-width: 440px;
        }

        .hero-buttons { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 24px; }

        .hero-stats { display: flex; gap: 16px; flex-wrap: nowrap; }
        .hero-stat { display: flex; align-items: center; gap: 6px; font-size: 15px; white-space: nowrap; }
        .hero-stat .stat-icon { font-size: 22px; }
        .hero-stat .num { font-weight: 800; font-size: 18px; display: block; }
        .hero-stat .label { color: #666; font-size: 12px; }

        /* ===== HERO IMAGE AREA ===== */
        .hero-image {
            flex: 1.2;
            min-width: 340px;
            max-width: 560px;
            text-align: center;
            position: relative;
        }
        .hero-image img { max-width: 100%; height: auto; }

        .deco-star, .deco-heart {
            position: absolute;
            font-size: 24px;
        }
        .deco-star { top: -10px; left: 32%; color: #F5B301; }
        .deco-heart { top: 50px; left: 18%; color: #E2577A; }

        @media (max-width: 768px) {
            .hero-inner { flex-direction: column; }
            .hero-text h1 { font-size: 26px; }
            .hero-image { max-width: 100%; }
        }

        /* ===== PAIN POINTS SECTION 3 ===== */
        .pain-points { padding: 20px 0 35px; background: #fff; position: relative; overflow: hidden; }
        .pain-points h2 { 
            text-align: center; 
            font-size: 24px; 
            font-weight: 800; 
            color: #1A1A1A; 
            margin-bottom: 28px; 
        }
        .pain-grid { display: flex; gap: 16px; flex-wrap: wrap; }
        .pain-card { flex: 1; min-width: 220px; }
        .pain-card img { width: 100%; height: auto; display: block; border-radius: 14px; }

        .pp-deco { position: absolute; font-size: 20px; }
        .pp-flash { top: 8px; left: 20px; color: #F5B301; }
        .pp-love  { top: 90px; left: 4px; color: #E2577A; font-size: 22px; }
        .pp-swirl-top { top: 20px; right: 30px; color: #A9D6F5; }
        .pp-star { top: 100px; right: 20px; color: #F5B301; }
        .pp-swirl-bottom { bottom: 10px; right: 60px; color: #A9D6F5; }

        /* ===== LEVELS SECTION 4 ===== */
        .levels { padding: 40px 0 50px; background: #FFF9F0; }
        .levels-inner { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }

        .level-cards { display: flex; gap: 16px; }
        .level-card { width: 150px; height: 282px; border-radius: 16px; overflow: hidden; box-shadow: 0 6px 14px rgba(0,0,0,0.1); }
        .level-card img { width: 100%; height: auto; display: block; }
    
        .levels-desc { flex: 1; min-width: 300px; position: relative; }
        .levels-desc h2 { font-size: 30px; font-weight: 800; color: #1A1A1A; margin-bottom: 14px; line-height: 1.3; }
        .levels-desc p { color: #666; font-size: 15px; margin-bottom: 24px; max-width: 460px; }

        .quote-box {
            background: #fff;
            border-radius: 14px;
            padding: 18px 22px;
            font-weight: 700;
            font-size: 15px;
            color: #555;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            max-width: 460px;
        }
        .quote-mark { color: #E2577A; font-size: 28px; font-weight: 800; margin-right: 4px; line-height: 0; vertical-align: -6px; }

        .lv-deco { position: absolute; font-size: 20px; }
        .lv-heart { top: 4px; right: -20px; color: #E2577A; }
        .lv-swirl { top: -30px; right: 30px; color: #A9D6F5; font-size: 22px; }
        .lv-squiggle { bottom: 30px; right: -30px; color: #F5B301; }

        /* ===== VIDEO SECTION 5 ===== */
        .video-section { background: #FBE3EA; padding: 20px 0 20px; position: relative; overflow: hidden; }
        .video-heading { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 24px; }
        .vs-deco { font-size: 20px; margin-top: 6px; }
        .video-heading h2 { font-size: 24px; font-weight: 800; color: #1A1A1A; margin-bottom: 4px; }
        .video-heading p { color: #555; font-size: 14px; }

        .video-grid { display: flex; gap: 24px; align-items: stretch; flex-wrap: wrap; }

        .video-player { flex: 2; min-width: 340px; border-radius: 16px; overflow: hidden; }
        .video-thumb { width: 100%; display: block; height: auto; }

        .video-pills { flex: 1; min-width: 260px; display: flex; flex-direction: column; gap: 14px; justify-content: center; }
        .pill {
            background: #fff;
            border-radius: 14px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .pill-icon {
            width: 44px; height: 44px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            overflow: hidden;
        }
        .pill-icon img { width: 100%; height: 100%; object-fit: cover; }
        .pill-purple { background: #EDE3F9; }
        .pill-green { background: #DCF3E4; }
        .pill-yellow { background: #FDF0D0; }
        .pill p { font-weight: 700; font-size: 14px; color: #333; }

        /* ===== APA YANG KAMU DAPATKAN SECTION 6 ===== */
        .benefits { padding: 20px 0; background: #fff; }
        .benefits h2 { 
            text-align: center; 
            font-size: 24px; 
            font-weight: 800; 
            color: #1A1A1A; 
            margin-bottom: 28px; 
        }

        .benefit-grid { display: flex; gap: 16px; flex-wrap: wrap; }
        .benefit-card {
            flex: 1;
            min-width: 200px;
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
        }
        .benefit-icon {
            width: 56px; height: 56px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
        }
        .benefit-card h3 { font-size: 16px; font-weight: 800; margin-bottom: 6px; }
        .benefit-card p { font-size: 13px; color: #666; }

        .benefit-purple { background: #EDE3F9; }
        .benefit-purple .benefit-icon { background: #DCC9F2; color: #7B4FC9; }

        .benefit-green { background: #DCF3E4; }
        .benefit-green .benefit-icon { background: #C2E9CE; color: #3D9B5C; }

        .benefit-yellow { background: #FBF0C8; }
        .benefit-yellow .benefit-icon { background: #F5E29A; color: #A8890B; }

        .benefit-pink { background: #FBE3EA; }
        .benefit-pink .benefit-icon { background: #F6CCDA; color: #D94C77; }

        /* ===== PRICING SECTION 7 ===== */
        .pricing { 
            padding: 20px 0 10px; 
            background: #ffffff; 
        }

        .pricing-box {
            background: #FEF5DA;
            border-radius: 28px;
            padding: 15px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            overflow: hidden;
        }

        .pricing-text { 
            flex: 1; 
            max-width: 440px; 
            text-align: center;
        }

        .pricing-text h2 { 
            font-size: 24px; 
            font-weight: 800; 
            color: #1A1A1A;
            margin-bottom: 12px; 
            line-height: 1.3;
        }

        .price-old { 
            color: #828282; 
            font-weight: 700; 
            font-size: 16px; 
            text-decoration: line-through; 
            margin-bottom: 6px; 
        }

        .price-new { 
            font-size: 37px; 
            font-weight: 900; 
            color: #111111;
            margin-bottom: 20px; 
            line-height: 1;
            letter-spacing: -1px;
        }

        .btn-pricing {
            background: #E55B7E;
            color: #ffffff;
            border: none;
            padding: 12px 50px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        .btn-pricing:hover {
            background: #d84b6e;
            transform: translateY(-2px);
        }

        .pricing-sub { 
            font-size: 14px; 
            color: #666666; 
            line-height: 1.5; 
            margin-top: 18px;
            font-weight: 500;
        }

        .pricing-visual { 
            flex: 1.1; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pricing-visual img { 
            max-width: 100%; 
            height: auto; 
            display: block;
        }

        @media (max-width: 900px) {
            .pricing-box {
                flex-direction: column;
                padding: 40px 24px;
                gap: 30px;
            }
            .pricing-text {
                max-width: 100%;
            }
            .pricing-text h2 {
                font-size: 22px;
            }
            .price-new {
                font-size: 42px;
            }
        }

        /* ===== TESTIMONIALS SECTION 8 ===== */
        .testimonials {
            padding: 20px 0 10px;
            background: #ffffff;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: #1A1A1A;
            margin-bottom: 28px;
        }

        .testimonial-grid {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .testimonial-card {
            flex: 1;
            min-width: 280px;
            max-width: 340px;
            border: 2px solid #E5E5E5;
            border-radius: 18px;
            padding: 24px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px;
        }

        .testimonial-avatar {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            object-fit: cover;
        }

        .testimonial-user-info h4 {
            font-size: 16px;
            font-weight: 800;
            color: #111111;
            margin: 0;
            line-height: 1.2;
        }

        .testimonial-user-info p {
            font-size: 13px;
            color: #888888;
            margin: 2px 0 0;
            font-weight: 500;
        }

        .testimonial-quote {
            font-size: 14.5px;
            color: #444444;
            line-height: 1.5;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .testimonial-stars {
            color: #FFC107;
            font-size: 16px;
            display: flex;
            gap: 4px;
        }

        @media (max-width: 768px) {
            .testimonial-card {
                max-width: 100%;
            }
        }

        /* ===== FAQ SECTION ===== */
        .faq-section {
            padding: 20px 0 25px;
            background: #ffffff;
        }

        .faq-section h2 {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: #1A1A1A;
            margin-bottom: 32px;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .faq-card {
            border: 2px solid #F6D5DD;
            border-radius: 20px;
            padding: 20px 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: #ffffff;
        }

        .faq-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 22px;
        }

        .faq-icon-purple {
            background-color: #E6DBF4;
            color: #7B4FC9;
        }

        .faq-icon-pink {
            background-color: #FCE3EC;
            color: #E55B7E;
        }

        .faq-content h4 {
            font-size: 16px;
            font-weight: 800;
            color: #111111;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .faq-content p {
            font-size: 13.5px;
            color: #666666;
            line-height: 1.5;
            margin: 0;
        }

        @media (max-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== BOTTOM CTA BANNER SECTION ===== */
        .bottom-cta {
            background-color: #E2577A;
            position: relative;
            overflow: hidden;
            padding: 2px 0 0;
        }

        .cta-bg-light {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 36px;
            background: #FBDCE3;
            z-index: 0;
        }

        .cta-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .cta-left {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
            padding-bottom: 36px;
        }

        .cta-text { color: #ffffff; }
        .cta-quote { font-size: 15px; font-weight: 700; margin-bottom: 6px; opacity: 0.95; }
        .cta-title { font-size: 20px; font-weight: 800; line-height: 1.3; max-width: 400px; }

        .btn-yellow-cta {
            background-color: #FCD535;
            color: #111111;
            font-weight: 800;
            font-size: 14px;
            padding: 13px 22px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .btn-yellow-cta:hover { background-color: #f7cb15; }

        .cta-illustration img { max-height: 190px; width: auto; display: block; }

        @media (max-width: 900px) {
            .cta-container { flex-direction: column; text-align: center; }
            .cta-left { flex-direction: column; padding-bottom: 0; gap: 16px; }
            .cta-illustration img { max-height: 160px; }
        }
    </style>
</head>
<body>

    <header>
        <div class="container header-inner">
            <div class="logo">
                <img src="{{ asset('images/logo_mtk_booyah.jpeg') }}" alt="Matematika Booyah" class="logo-icon">
                Matematika Booyah!
            </div>
            <nav>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Modul</a></li>
                    <li><a href="#">Testimoni</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
            <a href="{{ url('/checkout') }}" class="btn-primary">Beli Sekarang</a>
        </div>
    </header>

    <section class="hero">
        <div class="container hero-inner">

            <div class="hero-text">
                <span class="badge"><i class="fa-solid fa-book"></i> E-modul matematika SD</span>

                <h1>Bantu si kecil jago matematika, <span class="highlight">tanpa drama</span> belajar di rumah</h1>

                <p>Modul latihan bertahap untuk anak SD — dari mengenal angka sampai soal cerita yang seru dan menantang. Belajar jadi menyenangkan, percaya diri pun tumbuh setiap hari!</p>

                <div class="hero-buttons">
                    <a href="{{ url('/checkout') }}" class="btn-primary"><i class="fa-solid fa-cart-shopping"></i> Beli Sekarang</a>
                    <a href="#" class="btn-outline">Liat contoh modul</a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="stat-icon">📖</span>
                        <div><span class="num">3</span><span class="label">Modul</span></div>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon">💠</span>
                        <div><span class="num">60</span><span class="label">Sub-level</span></div>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon">🎬</span>
                        <div><span class="num">500+</span><span class="label">Video panduan</span></div>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon">✍️</span>
                        <div><span class="num">80%</span><span class="label">Bisa dikerjakan mandiri</span></div>
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <span class="deco-star">⭐</span>
                <span class="deco-heart">🩷</span>
                <img src="{{ asset('images/hero-visual.png') }}" alt="Ibu dan anak belajar bersama Matematika Booyah">
            </div>

        </div>
    </section>

    <!-- ===== PAIN POINTS SECTION 9 ===== -->
    <section class="pain-points">
        <span class="pp-deco pp-flash">⚡</span>
        <span class="pp-deco pp-love">💗</span>
        <span class="pp-deco pp-swirl-top">🔄</span>
        <span class="pp-deco pp-star">⭐</span>
        <span class="pp-deco pp-swirl-bottom">🌀</span>
        <div class="container">
            <h2>Apakah ini yang bunda rasakan?</h2>
            <div class="pain-grid">
                <div class="pain-card">
                    <img src="{{ asset('images/pain-card-1.png') }}" alt="Anak susah fokus saat diajak belajar matematika">
                </div>
                <div class="pain-card">
                    <img src="{{ asset('images/pain-card-2.png') }}" alt="Bingung menjelaskan tanpa ikut emosi">
                </div>
                <div class="pain-card">
                    <img src="{{ asset('images/pain-card-3.png') }}" alt="Waktu terbatas untuk mendampingi tiap hari">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LEVELS SECTION ===== -->
    <section class="levels">
        <div class="container levels-inner">
            <div class="level-cards">
                <div class="level-card">
                    <img src="{{ asset('images/level-a.png') }}" alt="Level A">
                </div>
                <div class="level-card">
                    <img src="{{ asset('images/level-b.png') }}" alt="Level B">
                </div>
                <div class="level-card">
                    <img src="{{ asset('images/level-c.png') }}" alt="Level C">
                </div>
            </div>

            <div class="levels-desc">
                <span class="lv-deco lv-heart">💗</span>
                <span class="lv-deco lv-squiggle">〰️</span>
                <h2>Modul yang membuat anak belajar sendiri</h2>
                <p>Bertahap dari mengenal pola dan angka, sampai soal cerita tentang uang, pecahan, dan satuan — anak menemukan sendiri cara berpikirnya.</p>
                <div class="quote-box">
                    <span class="quote-mark">"</span>
                    Membangun kepercayaan diri anak untuk berani mencoba dan berfikir sendiri"
                </div>
            </div>
        </div>
    </section>

    <!-- ===== VIDEO SECTION ===== -->
    <section class="video-section">
        <div class="container">
            <div class="video-heading">
                <span class="vs-deco">✍️</span>
                <div>
                    <h2>Lihat si kecil belajar dengan Matematika Booyah!</h2>
                    <p>Video nyata anak belajar mandiri di rumah menggunkan modul kami.</p>
                </div>
            </div>

            <div class="video-grid">
                <div class="video-player">
                    <img src="{{ asset('images/video-thumb.png') }}" alt="Anak sedang belajar" class="video-thumb">
                </div>

                <div class="video-pills">
                    <div class="pill">
                        <span class="pill-icon pill-purple"><img src="{{ asset('images/pill-icon1.png') }}" alt="Belajar mandiri"></span>
                        <p>Belajar mandiri dengan langkah bertahap</p>
                    </div>
                    <div class="pill">
                        <span class="pill-icon pill-purple"><img src="{{ asset('images/pill-icon2.png') }}" alt="Belajar mandiri"></span>
                        <p>Soal menarik yang bikin penasaran</p>
                    </div>
                    <div class="pill">
                        <span class="pill-icon pill-purple"><img src="{{ asset('images/pill-icon3.png') }}" alt="Belajar mandiri"></span>
                        <p>Anak lebih percaya diri setiap hari</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== APA YANG KAMU DAPATKAN SECTION ===== -->
    <section class="benefits">
        <div class="container">
            <h2>Apa yang kamu dapatkan <i class="fa-solid fa-bolt-lightning" style="color:#F5B301; font-size:18px;"></i></h2>
            <div class="benefit-grid">
                <div class="benefit-card benefit-purple">
                    <div class="benefit-icon"><i class="fa-solid fa-book-open"></i></div>
                    <h3>E-modul A, B, C</h3>
                    <p>Lengkap 3 level sesuai kamampuan anak</p>
                </div>
                <div class="benefit-card benefit-green">
                    <div class="benefit-icon"><i class="fa-regular fa-heart"></i></div>
                    <h3>Panduan Pendamping</h3>
                    <p>Tips mudah untuk bunda di rumah</p>
                </div>
                <div class="benefit-card benefit-yellow">
                    <div class="benefit-icon"><i class="fa-solid fa-print"></i></div>
                    <h3>Siap cetak</h3>
                    <p>Format PDF praktis bisa dicetak kapan saja</p>
                </div>
                <div class="benefit-card benefit-pink">
                    <div class="benefit-icon"><i class="fa-solid fa-chart-simple"></i></div>
                    <h3>Progres bertahap</h3>
                    <p>Pantau perkembangan anak dengan mudah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PRICING SECTION ===== -->
    <section class="pricing">
        <div class="container">
            <div class="pricing-box">

                <div class="pricing-text">
                    <h2>Investasi untuk masa depan si kecil</h2>
                    <p class="price-old">Nilai total Rp 850.000</p>
                    <div class="price-new">Rp 49.000</div>
                    <a href="{{ url('/checkout') }}" class="btn-pricing">Saya mau e-modulnya sekarang</a>
                    <p class="pricing-sub">
                        Akses setelah pembayaran berhasil<br>
                        • QRIS • Transfer • E-wallet
                    </p>
                </div>

                <div class="pricing-visual">
                    <img src="{{ asset('images/pricing-visual.png') }}" alt="Ibu memeluk anak dengan pesan semangat">
                </div>

            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALS SECTION ===== -->
    <section class="testimonials">
        <div class="container">
            <h2>Apa kata bunda-bunda lain</h2>
            <div class="testimonial-grid">
                
                <!-- Card Testimoni 1 -->
                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-header">
                            <img src="{{ asset('images/ibusari.png') }}" alt="Ibu Sari" class="testimonial-avatar">
                            <div class="testimonial-user-info">
                                <h4>Ibu Sari</h4>
                                <p>Ibu dari 1 anak, kelas 3 SD</p>
                            </div>
                        </div>
                        <p class="testimonial-quote">"Anak jadi lebih percaya diri mengerjakan sendiri."</p>
                    </div>
                    <div class="testimonial-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <!-- Card Testimoni 2 -->
                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-header">
                            <img src="{{ asset('images/iburatna.png') }}" alt="Ibu Ratna" class="testimonial-avatar">
                            <div class="testimonial-user-info">
                                <h4>Ibu Ratna</h4>
                                <p>Ibu dari 2 anak</p>
                            </div>
                        </div>
                        <p class="testimonial-quote">"Panduannya mudah diikuti, saya tidak bingung lagi."</p>
                    </div>
                    <div class="testimonial-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <!-- Card Testimoni 3 -->
                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-header">
                            <img src="{{ asset('images/ibudewi.png') }}" alt="Ibu Dewi" class="testimonial-avatar">
                            <div class="testimonial-user-info">
                                <h4>Ibu Dewi</h4>
                                <p>Ibu dari 1 anak, kelas 1 SD</p>
                            </div>
                        </div>
                        <p class="testimonial-quote">"Materinya bertahap, anak tidak mudah menyerah."</p>
                    </div>
                    <div class="testimonial-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== FAQ SECTION ===== -->
    <section class="faq-section">
        <div class="container">
            <h2>Pertanyaan yang sering ditanyakan</h2>
            <div class="faq-grid">
                
                <!-- FAQ Item 1 -->
                <div class="faq-card">
                    <div class="faq-icon-wrapper faq-icon-purple">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="faq-content">
                        <h4>Modul ini untuk usia berapa?</h4>
                        <p>Untuk anak usia SD, disesuaikan levelnya (A, B, C) mengikuti kemampuan awal anak, bukan usia patokan.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-card">
                    <div class="faq-icon-wrapper faq-icon-pink">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="faq-content">
                        <h4>Apakah saya perlu mencetak sendiri?</h4>
                        <p>Ya, modul dalam format siap cetak (PDF) yang bisa diprint di rumah atau percetakan terdekat.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-card">
                    <div class="faq-icon-wrapper faq-icon-purple">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="faq-content">
                        <h4>Bagaimana kalau anak saya belum lancar di level dasar?</h4>
                        <p>Tidak masalah — modul disusun bertahap dari A1, jadi anak bisa mulai dari level paling dasar sesuai kemampuannya.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-card">
                    <div class="faq-icon-wrapper faq-icon-pink">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="faq-content">
                        <h4>Apakah ada panduan untuk saya sebagai orang tua?</h4>
                        <p>Ada — setiap modul dilengkapi Panduan Pendamping, supaya bunda tahu kapan membantu dan kapan membiarkan anak mencoba sendiri.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== BOTTOM CTA BANNER ===== -->
    <section class="bottom-cta">
        <div class="cta-bg-light"></div>
        <div class="container cta-container">
            <div class="cta-left">
                <div class="cta-text">
                    <div class="cta-quote">"Matematika seru, anak percaya diri, bunda pun bahagia!"</div>
                    <div class="cta-title">Yuk, mulai perjalanan si kecil jago matematika hari ini!</div>
                </div>
                <a href="{{ url('/checkout') }}" class="btn-yellow-cta">
                    Saya mau akses sekarang <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="cta-illustration">
                <img src="{{ asset('images/cta-mother-child.png') }}" alt="Ibu dan anak belajar bersama">
            </div>
        </div>
    </section>

</body>
</html>
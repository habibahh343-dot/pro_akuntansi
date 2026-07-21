<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pro Akuntansi — Sistem Informasi Akuntansi')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .content-wrapper {
            flex: 1 0 auto;
        }

        /* --- NAVBAR STYLES --- */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.6) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-weight: 800;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-custom .navbar-brand span {
            color: #60a5fa;
        }

        .navbar-custom .icon-box {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            color: white;
        }

        /* Nav Buttons */
        .navbar-custom .btn-nav-register {
            color: #93c5fd;
            border: 1px solid rgba(96, 165, 250, 0.4);
            background: transparent;
            border-radius: 50px;
            padding: 6px 20px;
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .navbar-custom .btn-nav-register:hover {
            background: rgba(96, 165, 250, 0.15);
            color: #bfdbfe;
        }

        .navbar-custom .btn-nav-login {
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 7px 22px;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s;
        }

        .navbar-custom .btn-nav-login:hover {
            background: #2563eb;
            color: white;
        }

        /* --- HERO SECTION STYLES --- */
        .hero-section {
            background: linear-gradient(to right, #1e3a8a, #0f172a);
            color: white;
            padding: 140px 0 90px; /* Padding atas ditambah agar tidak tertutup navbar fixed */
            text-align: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-section h1 .accent {
            color: #60a5fa;
        }

        .hero-section .lead {
            font-size: 1.5rem;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            color: #bfdbfe;
        }

        .hero-section .btn {
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .hero-section .btn-light {
            background-color: white;
            color: #1e3a8a;
            border: 2px solid white;
        }

        .hero-section .btn-light:hover {
            background-color: transparent;
            color: white;
            border-color: white;
        }

        .hero-section .btn-outline-light {
            color: white;
            border: 2px solid white;
        }

        .hero-section .btn-outline-light:hover {
            background-color: white;
            color: #1e3a8a;
        }

        /* Stats Row Style */
        .stats-row {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 60px;
        }
        
        .stat-bubble { text-align: center; }
        .stat-bubble .num { font-size: 2rem; font-weight: 900; color: white; }
        .stat-bubble .lbl { font-size: 0.78rem; color: #93c5fd; letter-spacing: 0.5px; text-transform: uppercase; }
        .stat-divider { width: 1px; background: rgba(255,255,255,0.15); align-self: stretch; }

        /* Features Section Style */
        .features-section { 
            background: #f0f4f8; 
            padding: 90px 40px; 
        }
        
        .section-eyebrow {
            text-align: center; 
            color: #3b82f6;
            font-size: 0.78rem; 
            font-weight: 800;
            letter-spacing: 2px; 
            text-transform: uppercase; 
            margin-bottom: 12px;
        }
        
        .section-title {
            text-align: center; 
            font-size: 2rem; 
            font-weight: 900;
            color: #0f172a; 
            margin-bottom: 10px;
        }
        
        .section-sub {
            text-align: center; 
            color: #64748b; 
            font-size: 0.95rem;
            max-width: 480px; 
            margin: 0 auto 60px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px; 
            max-width: 1100px; 
            margin: 0 auto;
        }
        
        .feature-card {
            background: white; 
            border-radius: 16px; 
            padding: 32px 28px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .feature-card:hover { 
            transform: translateY(-4px); 
            box-shadow: 0 10px 28px rgba(30,58,138,0.12); 
        }
        
        .feature-icon {
            width: 50px; 
            height: 50px; 
            border-radius: 14px;
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 1.4rem; 
            margin-bottom: 18px;
        }
        
        .feature-card h5 { font-size: 1rem; font-weight: 800; color: #0f172a; margin-bottom: 8px; }
        .feature-card p { font-size: 0.87rem; color: #64748b; line-height: 1.6; }

        /* Footer Style */
        footer {
            flex-shrink: 0;
            background-color: #0f172a;
            color: #94a3b8;
        }
        footer span {
            color: #60a5fa;
        }
    </style>

    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top animate__animated animate__fadeInDown">
        <div class="container px-4">
            <a class="navbar-brand" href="/">
                <div class="icon-box"><i class="bi bi-bar-chart-fill"></i></div>
                Pro <span>Akuntansi</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto gap-2 mt-2 mt-lg-0">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-nav-login text-center">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-nav-register text-center">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-nav-login text-center">
                            <i class="bi bi-person-plus me-1"></i> Daftar Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container-fluid p-0">
            
            <section class="hero-section">
                <div class="container">
                    <h1 class="animate__animated animate__fadeInDown">
                        Kelola Keuangan Bisnis<br>dengan <span class="accent">Pro Akuntansi</span>
                    </h1>
                    <p class="lead animate__animated animate__fadeInUp">
                        Solusi manajemen keuangan lengkap — dari pencatatan jurnal, buku besar, faktur, hingga laporan keuangan siap cetak dalam satu platform.
                    </p>
                    
                    <div class="mt-4 animate__animated animate__fadeInUp animate__delay-1s">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-light me-3">
                                <i class="bi bi-speedometer2 me-2"></i> Pergi ke Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light me-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light">
                                <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                            </a>
                        @endauth
                    </div>

                    <div class="stats-row animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="stat-bubble">
                            <div class="num">12</div>
                            <div class="lbl">Modul Aktif</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-bubble">
                            <div class="num">Real-time</div>
                            <div class="lbl">Laporan Keuangan</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-bubble">
                            <div class="num">100%</div>
                            <div class="lbl">Data Aman</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="features-section">
                <p class="section-eyebrow">✦ Fitur Utama</p>
                <h2 class="section-title">Semua yang Anda Butuhkan</h2>
                <p class="section-sub">Siklus akuntansi terintegrasi yang dirancang untuk mempercepat pengolahan data finansial usaha Anda.</p>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#eff6ff;">
                            <i class="bi bi-journal-bookmark-fill" style="color:#3b82f6;"></i>
                        </div>
                        <h5>Data Perkiraan & Jurnal</h5>
                        <p>Kelola chart of accounts dan catat setiap transaksi lewat jurnal umum dengan posting otomatis ke buku besar.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#f5f3ff;">
                            <i class="bi bi-receipt-cutoff" style="color:#8b5cf6;"></i>
                        </div>
                        <h5>Faktur Penjualan & Pembelian</h5>
                        <p>Buat, kelola, dan lacak faktur dari pelanggan maupun pemasok secara real-time tanpa kerumitan manual.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#f0fdf4;">
                            <i class="bi bi-bar-chart-steps" style="color:#10b981;"></i>
                        </div>
                        <h5>Neraca Saldo & Laporan</h5>
                        <p>Generate neraca saldo dan laporan keuangan lengkap kapan saja dengan satu klik.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#fff7ed;">
                            <i class="bi bi-people-fill" style="color:#f97316;"></i>
                        </div>
                        <h5>Data Pelanggan & Pemasok</h5>
                        <p>Simpan dan kelola data mitra bisnis Anda secara terpusat dan terhubung langsung ke transaksi.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#fef2f2;">
                            <i class="bi bi-credit-card-fill" style="color:#ef4444;"></i>
                        </div>
                        <h5>Manajemen Pembayaran</h5>
                        <p>Rekam dan pantau status pembayaran masuk maupun keluar dengan histori yang lengkap dan akurat.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background:#ecfdf5;">
                            <i class="bi bi-shield-lock-fill" style="color:#14b8a6;"></i>
                        </div>
                        <h5>Keamanan Data</h5>
                        <p>Data Anda terenkripsi dan dilindungi dengan sistem autentikasi berlapis — aman 100% setiap saat.</p>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <footer class="py-4 text-center border-top border-secondary">
        <div class="container">
            <span>&copy; {{ date('Y') }} Pro Akuntansi</span> &mdash; Sistem Informasi Akuntansi Terintegrasi
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
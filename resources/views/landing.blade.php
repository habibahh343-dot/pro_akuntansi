<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Akuntansi — Sistem Informasi Akuntansi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; overflow-x: hidden; }

        .navbar-custom {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: rgba(15,23,42,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            padding: 16px 48px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-brand {
            display: flex; align-items: center; gap: 10px;
            color: white; font-size: 1.2rem; font-weight: 800;
            text-decoration: none;
        }
        .nav-brand .icon-box {
            width: 36px; height: 36px; border-radius: 9px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: white;
        }
        .nav-brand span { color: #60a5fa; }
        .nav-actions { display: flex; gap: 10px; align-items: center; }
        .btn-nav-register {
            color: #93c5fd; border: 1px solid rgba(96,165,250,0.4);
            background: transparent; border-radius: 8px;
            padding: 8px 20px; font-size: 0.88rem; font-weight: 600;
            text-decoration: none; transition: all 0.2s;
        }
        .btn-nav-register:hover { background: rgba(96,165,250,0.12); color: #bfdbfe; }
        .btn-nav-login {
            background: #3b82f6; color: white; border: none;
            border-radius: 8px; padding: 8px 22px;
            font-size: 0.88rem; font-weight: 700;
            text-decoration: none; transition: background 0.2s;
        }
        .btn-nav-login:hover { background: #2563eb; color: white; }

        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #3b82f6 100%);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            text-align: center; padding: 120px 24px 80px;
            position: relative; overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute; top: -120px; right: -120px;
            width: 500px; height: 500px; border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -100px; left: -100px;
            width: 400px; height: 400px; border-radius: 50%;
            background: radial-gradient(circle, rgba(30,58,138,0.3) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(96,165,250,0.15);
            border: 1px solid rgba(96,165,250,0.35);
            color: #93c5fd; border-radius: 24px;
            padding: 6px 18px; font-size: 0.8rem; font-weight: 600;
            letter-spacing: 0.8px; text-transform: uppercase;
            margin-bottom: 28px; position: relative; z-index: 1;
        }
        .hero h1 {
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 900; color: white; line-height: 1.15;
            margin-bottom: 22px; position: relative; z-index: 1;
        }
        .hero h1 .accent { color: #60a5fa; }
        .hero p {
            font-size: 1.1rem; color: #bfdbfe;
            max-width: 560px; line-height: 1.75;
            margin: 0 auto 42px; position: relative; z-index: 1;
        }
        .hero-cta {
            display: flex; gap: 14px; flex-wrap: wrap;
            justify-content: center; position: relative; z-index: 1;
            margin-bottom: 70px;
        }
        .btn-cta-primary {
            background: #3b82f6; color: white;
            border: none; border-radius: 12px;
            padding: 15px 36px; font-size: 1rem; font-weight: 700;
            text-decoration: none; display: inline-flex;
            align-items: center; gap: 8px;
            box-shadow: 0 8px 24px rgba(59,130,246,0.4);
            transition: all 0.2s;
        }
        .btn-cta-primary:hover {
            background: #2563eb; color: white;
            transform: translateY(-2px);
        }
        .btn-cta-secondary {
            background: rgba(255,255,255,0.08);
            color: white; border: 1.5px solid rgba(255,255,255,0.2);
            border-radius: 12px; padding: 15px 36px;
            font-size: 1rem; font-weight: 600;
            text-decoration: none; display: inline-flex;
            align-items: center; gap: 8px;
            transition: all 0.2s;
        }
        .btn-cta-secondary:hover { background: rgba(255,255,255,0.14); color: white; transform: translateY(-2px); }

        .stats-row {
            display: flex; gap: 40px; justify-content: center;
            flex-wrap: wrap; position: relative; z-index: 1;
        }
        .stat-bubble { text-align: center; }
        .stat-bubble .num { font-size: 2rem; font-weight: 900; color: white; }
        .stat-bubble .lbl { font-size: 0.78rem; color: #93c5fd; letter-spacing: 0.5px; }
        .stat-divider { width: 1px; background: rgba(255,255,255,0.15); align-self: stretch; }

        .features-section { background: #f0f4f8; padding: 90px 40px; }
        .section-eyebrow {
            text-align: center; color: #3b82f6;
            font-size: 0.78rem; font-weight: 800;
            letter-spacing: 2px; text-transform: uppercase; margin-bottom: 12px;
        }
        .section-title {
            text-align: center; font-size: 2rem; font-weight: 900;
            color: #0f172a; margin-bottom: 10px;
        }
        .section-sub {
            text-align: center; color: #64748b; font-size: 0.95rem;
            max-width: 480px; margin: 0 auto 60px;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px; max-width: 1100px; margin: 0 auto;
        }
        .feature-card {
            background: white; border-radius: 16px; padding: 32px 28px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(30,58,138,0.12); }
        .feature-icon {
            width: 50px; height: 50px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; margin-bottom: 18px;
        }
        .feature-card h5 { font-size: 1rem; font-weight: 800; color: #0f172a; margin-bottom: 8px; }
        .feature-card p { font-size: 0.87rem; color: #64748b; line-height: 1.6; }

        .cta-section {
            background: linear-gradient(135deg, #0f172a, #1e3a8a);
            padding: 90px 40px; text-align: center;
        }
        .cta-section h2 { font-size: 2.2rem; font-weight: 900; color: white; margin-bottom: 14px; }
        .cta-section h2 span { color: #60a5fa; }
        .cta-section p { color: #bfdbfe; font-size: 1rem; max-width: 460px; margin: 0 auto 38px; }
        .cta-buttons { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }

        footer { background: #0f172a; color: #475569; text-align: center; padding: 24px; font-size: 0.82rem; }
        footer span { color: #60a5fa; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar-custom">
    <a href="/" class="nav-brand">
        <div class="icon-box"><i class="bi bi-bar-chart-fill"></i></div>
        Sistem Informasi <span>&nbsp;Akuntansi</span>
    </a>
    <div class="nav-actions">
        <a href="/register" class="btn-nav-register">
            <i class="bi bi-person-plus me-1"></i>Register
        </a>
        <a href="/login" class="btn-nav-login">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-badge">
        <i class="bi bi-stars"></i> Platform Akuntansi Terintegrasi
    </div>
    <h1>Kelola Keuangan Bisnis<br>dengan <span class="accent">Pro Akuntansi</span></h1>
    <p>Solusi manajemen keuangan lengkap — dari pencatatan jurnal, buku besar, faktur, hingga laporan keuangan siap cetak dalam satu platform.</p>

    <div class="hero-cta">
        <a href="/register" class="btn-cta-primary">
            <i class="bi bi-rocket-takeoff-fill"></i> Mulai Gratis Sekarang
        </a>
        <a href="/login" class="btn-cta-secondary">
            <i class="bi bi-box-arrow-in-right"></i> Sudah Punya Akun
        </a>
    </div>

    <div class="stats-row">
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
</section>

<!-- FEATURES -->
<section class="features-section">
    <p class="section-eyebrow">✦ Fitur Unggulan</p>
    <h2 class="section-title">Semua yang Anda Butuhkan</h2>
    <p class="section-sub">12 modul terintegrasi dirancang untuk mempercepat siklus akuntansi bisnis Anda dari awal hingga laporan akhir.</p>

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

<!-- CTA BOTTOM -->
<section class="cta-section">
    <h2>Siap Mulai? <span>Daftar Sekarang</span></h2>
    <p>Bergabung dan rasakan kemudahan mengelola keuangan bisnis Anda dengan Pro Akuntansi.</p>
    <div class="cta-buttons">
        <a href="/register" class="btn-cta-primary">
            <i class="bi bi-person-plus-fill"></i> Buat Akun Gratis
        </a>
        <a href="/login" class="btn-cta-secondary">
            <i class="bi bi-box-arrow-in-right"></i> Login ke Akun Saya
        </a>
    </div>
</section>

<footer>
    &copy; 2026 <span>Pro Akuntansi</span> &mdash; Sistem Informasi Akuntansi Terintegrasi
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
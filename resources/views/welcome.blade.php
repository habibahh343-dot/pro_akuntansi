<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akuntansi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; }

        /* NAVBAR - Fixed di atas */
        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: linear-gradient(90deg, #0f172a, #1e3a8a);
            padding: 14px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        .navbar-brand-custom {
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .navbar-brand-custom span {
            color: #60a5fa;
        }
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .btn-login {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 8px 22px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-login:hover { background: #2563eb; color: white; }
        
        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 60%, #3b82f6 100%);
            color: white;
            padding: 130px 40px 50px;
            text-align: center;
        }
        .hero h1 { font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; }
        .hero p { font-size: 1rem; color: #bfdbfe; max-width: 500px; margin: 0 auto; }

        /* STATS */
        .stats-bar {
            background: white;
            display: flex;
            justify-content: center;
            gap: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .stat-item {
            padding: 18px 40px;
            text-align: center;
            border-right: 1px solid #e2e8f0;
        }
        .stat-item:last-child { border-right: none; }
        .stat-number { font-size: 1.5rem; font-weight: 800; color: #1e3a8a; }
        .stat-label { font-size: 0.75rem; color: #64748b; }

        /* MENU GRID */
        .section-title {
            text-align: center;
            padding: 40px 20px 10px;
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px 40px 50px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .menu-card {
            background: white;
            border-radius: 14px;
            padding: 28px 20px;
            text-align: center;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); /* Transisi lebih halus */
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(30,58,138,0.18);
            color: inherit;
        }
        .menu-icon {
            font-size: 2rem;
            margin-bottom: 12px;
            display: block;
            transition: transform 0.3s ease;
        }
        .menu-card:hover .menu-icon {
            transform: scale(1.12); /* Icon sedikit membesar saat di-hover */
        }
        .menu-card h6 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        .menu-card .btn-open {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 6px 20px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 4px;
            display: inline-block;
            transition: background 0.2s ease;
        }
        .menu-card:hover .btn-open { background: #3b82f6; }

        /* COLORS per card */
        .c1 .menu-icon { color: #3b82f6; }
        .c2 .menu-icon { color: #8b5cf6; }
        .c3 .menu-icon { color: #06b6d4; }
        .c4 .menu-icon { color: #10b981; }
        .c5 .menu-icon { color: #f59e0b; }
        .c6 .menu-icon { color: #ef4444; }
        .c7 .menu-icon { color: #ec4899; }
        .c8 .menu-icon { color: #14b8a6; }
        .c9 .menu-icon { color: #6366f1; }
        .c10 .menu-icon { color: #f97316; }
        .c11 .menu-icon { color: #84cc16; }
        .c12 .menu-icon { color: #0ea5e9; }

        /* FOOTER */
        footer {
            background: #0f172a;
            color: #64748b;
            text-align: center;
            padding: 20px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<nav class="navbar-custom animate__animated animate__fadeInDown">
    <a href="/" class="navbar-brand-custom">
        <i class="bi bi-bar-chart-fill" style="color:#60a5fa;font-size:1.5rem;"></i>
        Sistem Informasi <span>Akuntansi</span>
    </a>
    <div class="navbar-right">
    @auth
        <div class="dropdown">
            <button class="btn-login dropdown-toggle" type="button" data-bs-toggle="dropdown" style="background:#1e40af;">
                <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow animate__animated animate__fadeIn animate__faster">
                <li>
                    <div class="px-3 py-2 border-bottom">
                        <div class="fw-bold text-dark">{{ Auth::user()->name }}</div>
                        <div class="text-muted small">{{ Auth::user()->email }}</div>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="bi bi-person-fill me-2 text-primary"></i>Profil Saya
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <a href="{{ route('register') }}" class="btn-login" style="background:transparent;border:1px solid #60a5fa;color:#60a5fa;">
            <i class="bi bi-person-plus me-1"></i>Register
        </a>
        <a href="{{ route('login') }}" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login
        </a>
    @endauth
    </div>
</nav>

<section class="hero">
    <h1 class="animate__animated animate__fadeInDown"><i class="bi bi-building me-2"></i>Pro Akuntansi</h1>
    <p class="animate__animated animate__fadeInUp animate__delay-1s">Platform manajemen keuangan terintegrasi untuk bisnis modern Anda</p>
</section>

<div class="stats-bar animate__animated animate__fadeInUp animate__delay-1s">
    <div class="stat-item">
        <div class="stat-number">12</div>
        <div class="stat-label">Modul Aktif</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">Real-time</div>
        <div class="stat-label">Laporan Keuangan</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">100%</div>
        <div class="stat-label">Data Aman</div>
    </div>
</div>

<div class="section-title animate__animated animate__fadeIn">Menu Utama</div>

<div class="menu-grid animate__animated animate__fadeInUp animate__delay-1s">
    <a href="/perkiraan" class="menu-card c1">
        <span class="menu-icon"><i class="bi bi-journal-bookmark-fill"></i></span>
        <h6>Data Perkiraan</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/jurnal" class="menu-card c2">
        <span class="menu-icon"><i class="bi bi-pencil-square"></i></span>
        <h6>Jurnal Umum</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/jurnal_detail" class="menu-card c3">
        <span class="menu-icon"><i class="bi bi-list-columns-reverse"></i></span>
        <h6>Jurnal Detail</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/buku_besar" class="menu-card c4">
        <span class="menu-icon"><i class="bi bi-book-fill"></i></span>
        <h6>Buku Besar</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/saldo_akun" class="menu-card c5">
        <span class="menu-icon"><i class="bi bi-wallet2"></i></span>
        <h6>Saldo Akun</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/pelanggan" class="menu-card c6">
        <span class="menu-icon"><i class="bi bi-people-fill"></i></span>
        <h6>Data Pelanggan</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/pemasok" class="menu-card c7">
        <span class="menu-icon"><i class="bi bi-truck"></i></span>
        <h6>Data Pemasok</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/faktur_penjualan" class="menu-card c8">
        <span class="menu-icon"><i class="bi bi-receipt"></i></span>
        <h6>Faktur Penjualan</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/faktur_pembelian" class="menu-card c9">
        <span class="menu-icon"><i class="bi bi-cart-fill"></i></span>
        <h6>Faktur Pembelian</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/pembayaran" class="menu-card c10">
        <span class="menu-icon"><i class="bi bi-credit-card-fill"></i></span>
        <h6>Pembayaran</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/neraca_saldo" class="menu-card c11">
        <span class="menu-icon"><i class="bi bi-bar-chart-steps"></i></span>
        <h6>Neraca Saldo</h6>
        <span class="btn-open">Buka</span>
    </a>
    <a href="/laporan_keuangan" class="menu-card c12">
        <span class="menu-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
        <h6>Laporan Keuangan</h6>
        <span class="btn-open">Buka</span>
    </a>
</div>

<footer>
    &copy; 2026 Pro Akuntansi &mdash; Sistem Informasi Akuntansi Terintegrasi
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
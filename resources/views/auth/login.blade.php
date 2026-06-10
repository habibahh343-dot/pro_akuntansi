<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Pro Akuntansi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #3b82f6 100%);
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 60px 70px;
            color: white;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 52px;
        }
        .brand-icon {
            width: 48px; height: 48px;
            background: rgba(255,255,255,0.12);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            color: #60a5fa;
        }
        .brand-text { font-size: 1.4rem; font-weight: 800; }
        .brand-text span { color: #60a5fa; }

        .tagline-badge {
            background: rgba(96,165,250,0.18);
            color: #93c5fd;
            border: 1px solid rgba(96,165,250,0.35);
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: inline-block;
        }
        .left-panel h1 {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
        }
        .left-panel h1 span { color: #60a5fa; }
        .left-panel p {
            color: #bfdbfe;
            font-size: 1rem;
            max-width: 380px;
            line-height: 1.7;
            margin-bottom: 40px;
        }
        .feature-list { list-style: none; display: flex; flex-direction: column; gap: 14px; }
        .feature-list li {
            display: flex; align-items: center; gap: 12px;
            color: #cbd5e1; font-size: 0.92rem;
        }
        .feature-list li i {
            width: 32px; height: 32px;
            background: rgba(59,130,246,0.2);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #60a5fa; font-size: 1rem;
            flex-shrink: 0;
        }

        /* ── RIGHT PANEL (CARD) ── */
        .right-panel {
            width: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
        }
        .auth-card {
            background: white;
            border-radius: 20px;
            padding: 44px 40px;
            width: 100%;
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
        }
        .auth-card-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .auth-card-header .icon-wrap {
            width: 60px; height: 60px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 16px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.6rem; color: white;
            margin-bottom: 16px;
            box-shadow: 0 8px 20px rgba(59,130,246,0.35);
        }
        .auth-card-header h2 {
            font-size: 1.5rem; font-weight: 800;
            color: #0f172a; margin-bottom: 6px;
        }
        .auth-card-header p { color: #64748b; font-size: 0.88rem; }

        .form-label {
            font-size: 0.83rem; font-weight: 700;
            color: #374151; letter-spacing: 0.3px;
            margin-bottom: 6px;
        }
        .input-group-custom {
            position: relative; margin-bottom: 18px;
        }
        .input-group-custom .input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8; font-size: 1rem; z-index: 2;
        }
        .input-group-custom input {
            width: 100%;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 14px 11px 42px;
            font-size: 0.9rem;
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .input-group-custom input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
            background: white;
        }
        .input-group-custom .toggle-pw {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: #94a3b8; cursor: pointer; font-size: 1rem;
        }
        .input-group-custom .toggle-pw:hover { color: #3b82f6; }

        .form-row-meta {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 24px; margin-top: -6px;
        }
        .form-check-label { font-size: 0.83rem; color: #475569; }
        .forgot-link {
            font-size: 0.83rem; color: #3b82f6;
            text-decoration: none; font-weight: 600;
        }
        .forgot-link:hover { color: #1d4ed8; text-decoration: underline; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            color: white; border: none;
            border-radius: 10px; padding: 13px;
            font-size: 0.95rem; font-weight: 700;
            cursor: pointer; transition: opacity 0.2s, transform 0.15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-submit:hover { opacity: 0.9; transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }

        .divider {
            text-align: center; position: relative;
            margin: 24px 0; color: #cbd5e1; font-size: 0.8rem;
        }
        .divider::before, .divider::after {
            content: ''; position: absolute; top: 50%;
            width: calc(50% - 28px); height: 1px; background: #e2e8f0;
        }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .register-link {
            text-align: center; font-size: 0.88rem; color: #64748b;
        }
        .register-link a {
            color: #3b82f6; font-weight: 700; text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }

        /* validation errors */
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            border-radius: 10px; padding: 12px 16px;
            margin-bottom: 20px; font-size: 0.85rem; color: #dc2626;
        }
        .input-error { border-color: #f87171 !important; }
        .error-msg { font-size: 0.78rem; color: #ef4444; margin-top: 4px; }

        @media (max-width: 900px) {
            .left-panel { display: none; }
            body { justify-content: center; }
            .right-panel { width: 100%; max-width: 480px; }
        }
    </style>
</head>
<body>

<!-- LEFT PANEL -->
<div class="left-panel">
    <div class="brand">
        <div class="brand-icon"><i class="bi bi-bar-chart-fill"></i></div>
        <div class="brand-text">Sistem Informasi <span>Akuntansi</span></div>
    </div>

    <span class="tagline-badge">✦ Platform Keuangan #1</span>
    <h1>Kelola Keuangan<br>Lebih <span>Cerdas</span></h1>
    <p>Masuk ke Pro Akuntansi dan kendalikan seluruh siklus keuangan bisnis Anda — dari jurnal hingga laporan — dalam satu platform terintegrasi.</p>

    <ul class="feature-list">
        <li><i class="bi bi-journal-check"></i> Jurnal otomatis & posting ke buku besar</li>
        <li><i class="bi bi-receipt-cutoff"></i> Faktur penjualan & pembelian real-time</li>
        <li><i class="bi bi-graph-up-arrow"></i> Laporan keuangan siap cetak kapan saja</li>
        <li><i class="bi bi-shield-lock-fill"></i> Data terenkripsi & aman 100%</li>
    </ul>
</div>

<!-- RIGHT PANEL -->
<div class="right-panel">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="icon-wrap"><i class="bi bi-box-arrow-in-right"></i></div>
            <h2>Selamat Datang!</h2>
            <p>Masuk ke akun Pro Akuntansi Anda</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert-error" style="background:#f0fdf4;border-color:#bbf7d0;color:#16a34a;">
                <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <label class="form-label">Alamat Email</label>
            <div class="input-group-custom">
                <i class="bi bi-envelope input-icon"></i>
                <input
                    type="email"
                    name="email"
                    placeholder="contoh@email.com"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    class="{{ $errors->has('email') ? 'input-error' : '' }}"
                    required autofocus
                >
            </div>
            @error('email') <p class="error-msg mb-3">{{ $message }}</p> @enderror

            <!-- Password -->
            <label class="form-label">Password</label>
            <div class="input-group-custom">
                <i class="bi bi-lock input-icon"></i>
                <input
                    type="password"
                    name="password"
                    id="passwordInput"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    class="{{ $errors->has('password') ? 'input-error' : '' }}"
                    required
                >
                <button type="button" class="toggle-pw" onclick="togglePw()">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
            </div>
            @error('password') <p class="error-msg mb-3">{{ $message }}</p> @enderror

            <!-- Remember + Forgot -->
            <div class="form-row-meta">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-box-arrow-in-right"></i> Masuk Sekarang
            </button>
        </form>

        <div class="divider">atau</div>

        <div class="register-link">
            Belum punya akun?
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Daftar sekarang</a>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePw() {
    const input = document.getElementById('passwordInput');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
</body>
</html>
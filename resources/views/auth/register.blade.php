<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Pro Akuntansi</title>
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
            font-size: 1.5rem; color: #60a5fa;
        }
        .brand-text { font-size: 1.4rem; font-weight: 800; }
        .brand-text span { color: #60a5fa; }

        .tagline-badge {
            background: rgba(96,165,250,0.18);
            color: #93c5fd;
            border: 1px solid rgba(96,165,250,0.35);
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 0.78rem; font-weight: 600;
            letter-spacing: 1px; text-transform: uppercase;
            margin-bottom: 20px; display: inline-block;
        }
        .left-panel h1 {
            font-size: 2.5rem; font-weight: 800;
            line-height: 1.2; margin-bottom: 16px;
        }
        .left-panel h1 span { color: #60a5fa; }
        .left-panel p {
            color: #bfdbfe; font-size: 1rem;
            max-width: 380px; line-height: 1.7; margin-bottom: 40px;
        }

        .step-list { list-style: none; display: flex; flex-direction: column; gap: 16px; }
        .step-list li {
            display: flex; align-items: flex-start; gap: 14px;
        }
        .step-num {
            width: 32px; height: 32px; border-radius: 8px;
            background: rgba(59,130,246,0.25); border: 1px solid rgba(96,165,250,0.4);
            color: #60a5fa; font-size: 0.8rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .step-text strong { display: block; color: #e2e8f0; font-size: 0.9rem; }
        .step-text span { color: #94a3b8; font-size: 0.82rem; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
        }
        .auth-card {
            background: white;
            border-radius: 20px;
            padding: 40px 40px;
            width: 100%;
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
        }
        .auth-card-header {
            text-align: center; margin-bottom: 28px;
        }
        .auth-card-header .icon-wrap {
            width: 60px; height: 60px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 16px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.6rem; color: white;
            margin-bottom: 14px;
            box-shadow: 0 8px 20px rgba(59,130,246,0.35);
        }
        .auth-card-header h2 {
            font-size: 1.45rem; font-weight: 800;
            color: #0f172a; margin-bottom: 5px;
        }
        .auth-card-header p { color: #64748b; font-size: 0.88rem; }

        .form-label {
            font-size: 0.83rem; font-weight: 700;
            color: #374151; letter-spacing: 0.3px; margin-bottom: 6px;
        }
        .input-group-custom {
            position: relative; margin-bottom: 16px;
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
            font-size: 0.9rem; color: #1e293b;
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

        /* password strength bar */
        .pw-strength { margin-top: -8px; margin-bottom: 14px; }
        .pw-strength-bar {
            height: 4px; border-radius: 4px;
            background: #e2e8f0; overflow: hidden; margin-bottom: 4px;
        }
        .pw-strength-fill {
            height: 100%; width: 0; border-radius: 4px;
            transition: width 0.3s, background 0.3s;
        }
        .pw-strength-label { font-size: 0.75rem; color: #94a3b8; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            color: white; border: none;
            border-radius: 10px; padding: 13px;
            font-size: 0.95rem; font-weight: 700;
            cursor: pointer; transition: opacity 0.2s, transform 0.15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            margin-top: 6px;
        }
        .btn-submit:hover { opacity: 0.9; transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }

        .divider {
            text-align: center; position: relative;
            margin: 22px 0; color: #cbd5e1; font-size: 0.8rem;
        }
        .divider::before, .divider::after {
            content: ''; position: absolute; top: 50%;
            width: calc(50% - 28px); height: 1px; background: #e2e8f0;
        }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .login-link { text-align: center; font-size: 0.88rem; color: #64748b; }
        .login-link a { color: #3b82f6; font-weight: 700; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }

        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            border-radius: 10px; padding: 12px 16px;
            margin-bottom: 18px; font-size: 0.85rem; color: #dc2626;
        }
        .input-error { border-color: #f87171 !important; }
        .error-msg { font-size: 0.78rem; color: #ef4444; margin-top: -10px; margin-bottom: 12px; }

        @media (max-width: 960px) {
            .left-panel { display: none; }
            body { justify-content: center; }
            .right-panel { width: 100%; max-width: 500px; }
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

    <span class="tagline-badge">✦ Gratis Mulai Hari Ini</span>
    <h1>Daftar &amp; Mulai<br>Perjalanan <span>Akuntansi</span></h1>
    <p>Buat akun dalam hitungan detik dan langsung akses 12 modul keuangan terintegrasi — tanpa biaya tersembunyi.</p>

    <ul class="step-list">
        <li>
            <div class="step-num">01</div>
            <div class="step-text">
                <strong>Isi formulir pendaftaran</strong>
                <span>Nama, email, dan password yang aman</span>
            </div>
        </li>
        <li>
            <div class="step-num">02</div>
            <div class="step-text">
                <strong>Verifikasi email Anda</strong>
                <span>Cek inbox untuk link konfirmasi</span>
            </div>
        </li>
        <li>
            <div class="step-num">03</div>
            <div class="step-text">
                <strong>Mulai kelola keuangan</strong>
                <span>Langsung akses semua modul Pro Akuntansi</span>
            </div>
        </li>
    </ul>
</div>

<!-- RIGHT PANEL -->
<div class="right-panel">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="icon-wrap"><i class="bi bi-person-plus-fill"></i></div>
            <h2>Buat Akun Baru</h2>
            <p>Isi data di bawah untuk mulai menggunakan Pro Akuntansi</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label class="form-label">Nama Lengkap</label>
            <div class="input-group-custom">
                <i class="bi bi-person input-icon"></i>
                <input
                    type="text"
                    name="name"
                    placeholder="Nama lengkap Anda"
                    value="{{ old('name') }}"
                    autocomplete="name"
                    class="{{ $errors->has('name') ? 'input-error' : '' }}"
                    required autofocus
                >
            </div>
            @error('name') <p class="error-msg">{{ $message }}</p> @enderror

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
                    required
                >
            </div>
            @error('email') <p class="error-msg">{{ $message }}</p> @enderror

            <!-- Password -->
            <label class="form-label">Password</label>
            <div class="input-group-custom">
                <i class="bi bi-lock input-icon"></i>
                <input
                    type="password"
                    name="password"
                    id="pw1"
                    placeholder="Minimal 8 karakter"
                    autocomplete="new-password"
                    oninput="checkStrength(this.value)"
                    class="{{ $errors->has('password') ? 'input-error' : '' }}"
                    required
                >
                <button type="button" class="toggle-pw" onclick="togglePw('pw1','eye1')">
                    <i class="bi bi-eye" id="eye1"></i>
                </button>
            </div>
            <div class="pw-strength">
                <div class="pw-strength-bar">
                    <div class="pw-strength-fill" id="strengthFill"></div>
                </div>
                <span class="pw-strength-label" id="strengthLabel">Masukkan password</span>
            </div>
            @error('password') <p class="error-msg">{{ $message }}</p> @enderror

            <!-- Confirm Password -->
            <label class="form-label">Konfirmasi Password</label>
            <div class="input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input
                    type="password"
                    name="password_confirmation"
                    id="pw2"
                    placeholder="Ulangi password Anda"
                    autocomplete="new-password"
                    required
                >
                <button type="button" class="toggle-pw" onclick="togglePw('pw2','eye2')">
                    <i class="bi bi-eye" id="eye2"></i>
                </button>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-person-check-fill"></i> Daftar Sekarang
            </button>
        </form>

        <div class="divider">sudah punya akun?</div>

        <div class="login-link">
            <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Masuk ke akun Anda</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

function checkStrength(pw) {
    const fill  = document.getElementById('strengthFill');
    const label = document.getElementById('strengthLabel');
    let score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;

    const levels = [
        { w: '0%',   color: '#e2e8f0', text: 'Masukkan password' },
        { w: '25%',  color: '#ef4444', text: 'Lemah' },
        { w: '50%',  color: '#f97316', text: 'Cukup' },
        { w: '75%',  color: '#eab308', text: 'Bagus' },
        { w: '100%', color: '#22c55e', text: 'Kuat 💪' },
    ];
    const lvl = pw.length === 0 ? levels[0] : levels[score] || levels[1];
    fill.style.width = lvl.w;
    fill.style.background = lvl.color;
    label.textContent = lvl.text;
    label.style.color = lvl.color === '#e2e8f0' ? '#94a3b8' : lvl.color;
}
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Sistem Informasi Akuntansi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: linear-gradient(90deg, #0f172a, #1e3a8a); padding: 14px 30px; }
        .avatar { width: 80px; height: 80px; background: #1e3a8a; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: white; margin: 0 auto 16px; }
    </style>
</head>
<body>
    <nav class="navbar-custom d-flex align-items-center justify-content-between">
        <a href="/" class="text-white text-decoration-none fw-bold fs-5">
            <i class="bi bi-bar-chart-fill me-2" style="color:#60a5fa;"></i>Pro Akuntansi
        </a>
        <a href="/" class="btn btn-outline-light btn-sm">
            <i class="bi bi-house me-1"></i>Dashboard
        </a>
    </nav>

    <div class="container mt-5" style="max-width:600px;">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <div class="text-center mb-4">
                <div class="avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
            </div>

            <hr>

            <!-- Update Nama & Email -->
            <h6 class="fw-bold mb-3"><i class="bi bi-pencil-square me-2"></i>Update Profil</h6>
            @if(session('profile_success'))
                <div class="alert alert-success">{{ session('profile_success') }}</div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-semibold" style="background:#1e3a8a;border:none;">
                    Simpan Perubahan
                </button>
            </form>

            <hr class="mt-4">

            <!-- Ganti Password -->
            <h6 class="fw-bold mb-3"><i class="bi bi-lock-fill me-2"></i>Ganti Password</h6>
            @if(session('password_success'))
                <div class="alert alert-success">{{ session('password_success') }}</div>
            @endif
            <form method="POST" action="{{ route('profile.password') }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password Lama</label>
                    <input type="password" name="current_password"
                        class="form-control @error('current_password') is-invalid @enderror" required>
                    @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password Baru</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn w-100 fw-semibold text-white" style="background:#0f172a;border:none;">
                    Ganti Password
                </button>
            </form>

            <hr class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100 fw-semibold">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
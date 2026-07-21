<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Pro Akuntansi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e3a8a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card { border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.3); border: none; }
        .btn-primary { background: #1e3a8a; border: none; }
        .btn-primary:hover { background: #3b82f6; }
        .brand { color: #1e3a8a; font-weight: 800; }
    </style>
</head>
<body>
    <div class="card p-5" style="width:100%;max-width:420px;">
        <div class="text-center mb-4">
            <i class="bi bi-key-fill fs-1 text-primary"></i>
            <h4 class="brand mt-2">Lupa Password</h4>
            <p class="text-muted small">Masukkan email Anda, kami akan kirim link reset password</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="contoh@email.com" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary py-2 fw-semibold">
                    <i class="bi bi-send me-1"></i> Kirim Link Reset Password
                </button>
            </div>
            <div class="text-center">
                <small class="text-muted">
                    <a href="{{ route('login') }}" class="text-primary fw-semibold">Kembali ke Login</a>
                </small>
            </div>
        </form>
    </div>
</body>
</html>
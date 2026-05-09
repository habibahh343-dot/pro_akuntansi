<!DOCTYPE html>
<html>
<head>
    <title>Tambah Neraca Saldo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Neraca Saldo</h2>
    <form action="{{ route('neraca_saldo.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}">{{ $perkiraan->kode }} - {{ $perkiraan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Bulan</label>
            <input type="number" name="periode_bulan" class="form-control" min="1" max="12" required>
        </div>
        <div class="mb-3">
            <label>Periode Tahun</label>
            <input type="number" name="periode_tahun" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Saldo Debit</label>
            <input type="number" name="saldo_debit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Saldo Kredit</label>
            <input type="number" name="saldo_kredit" class="form-control" value="0" required>
        </div>
        <a href="{{ route('neraca_saldo.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
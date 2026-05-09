<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Laporan Keuangan</h2>
    <form action="{{ route('laporan_keuangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="Neraca">Neraca</option>
                <option value="Laba Rugi">Laba Rugi</option>
                <option value="Arus Kas">Arus Kas</option>
                <option value="Perubahan Ekuitas">Perubahan Ekuitas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Bulan</label>
            <select name="periode_bulan" class="form-control" required>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Tahun</label>
            <input type="number" name="periode_tahun" class="form-control" value="{{ date('Y') }}" required>
        </div>
        <div class="mb-3">
            <label>Data (JSON)</label>
            <textarea name="data" class="form-control" rows="5"></textarea>
        </div>
        <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
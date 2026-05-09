<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Besar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Buku Besar</h2>
    <form action="{{ route('buku_besar.store') }}" method="POST">
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
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No Referensi</label>
            <input type="text" name="no_ref" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Saldo</label>
            <input type="number" name="saldo" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Jurnal Detail</label>
            <select name="jurnal_detail_id" class="form-control">
                <option value="">-- Pilih Jurnal Detail --</option>
                @foreach($jurnalDetails as $detail)
                    <option value="{{ $detail->id }}">{{ $detail->id }} - {{ $detail->deskripsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Posisi</label>
            <select name="posisi" class="form-control" required>
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
            </select>
        </div>
        <a href="{{ route('buku_besar.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
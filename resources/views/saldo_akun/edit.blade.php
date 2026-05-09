<!DOCTYPE html>
<html>
<head>
    <title>Edit Saldo Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Saldo Akun</h2>
    <form action="{{ route('saldo_akun.update', $saldoAkun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}" {{ $saldoAkun->perkiraan_id == $perkiraan->id ? 'selected' : '' }}>
                        {{ $perkiraan->kode }} - {{ $perkiraan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ $saldoAkun->tahun }}" required>
        </div>
        <div class="mb-3">
            <label>Bulan</label>
            <select name="bulan" class="form-control" required>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $saldoAkun->bulan == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" value="{{ $saldoAkun->saldo_awal }}" required>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="{{ $saldoAkun->debit }}" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="{{ $saldoAkun->kredit }}" required>
        </div>
        <div class="mb-3">
            <label>Saldo Akhir</label>
            <input type="number" name="saldo_akhir" class="form-control" value="{{ $saldoAkun->saldo_akhir }}" required>
        </div>
        <a href="{{ route('saldo_akun.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
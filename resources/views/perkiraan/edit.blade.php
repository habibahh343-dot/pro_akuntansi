<!DOCTYPE html>
<html>
<head>
    <title>Edit Perkiraan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Perkiraan</h2>
    <form action="{{ route('perkiraan.update', $perkiraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $perkiraan->kode }}" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $perkiraan->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                @foreach(['Aktiva','Kewajiban','Ekuitas','Pendapatan','Beban'] as $tipe)
                    <option value="{{ $tipe }}" {{ $perkiraan->tipe == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Posisi Normal</label>
            <select name="posisi_normal" class="form-control" required>
                <option value="Debit" {{ $perkiraan->posisi_normal == 'Debit' ? 'selected' : '' }}>Debit</option>
                <option value="Kredit" {{ $perkiraan->posisi_normal == 'Kredit' ? 'selected' : '' }}>Kredit</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Tidak Ada --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->id }}" {{ $perkiraan->parent_id == $parent->id ? 'selected' : '' }}>
                        {{ $parent->kode }} - {{ $parent->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Level</label>
            <input type="number" name="level" class="form-control" value="{{ $perkiraan->level }}">
        </div>
        <div class="mb-3">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" value="{{ $perkiraan->saldo_awal }}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $perkiraan->keterangan }}</textarea>
        </div>
        <div class="mb-3">
            <label>Is Detail</label>
            <select name="is_detail" class="form-control">
                <option value="1" {{ $perkiraan->is_detail ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$perkiraan->is_detail ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $perkiraan->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$perkiraan->is_active ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <a href="{{ route('perkiraan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
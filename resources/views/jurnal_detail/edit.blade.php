<!DOCTYPE html>
<html>
<head>
    <title>Edit Jurnal Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Jurnal Detail</h2>
    <form action="{{ route('jurnal_detail.update', $jurnalDetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No Jurnal</label>
            <select name="jurnal_id" class="form-control" required>
                <option value="">-- Pilih Jurnal --</option>
                @foreach($jurnals as $jurnal)
                    <option value="{{ $jurnal->id }}" {{ $jurnalDetail->jurnal_id == $jurnal->id ? 'selected' : '' }}>
                        {{ $jurnal->no_jurnal }} - {{ $jurnal->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}" {{ $jurnalDetail->perkiraan_id == $perkiraan->id ? 'selected' : '' }}>
                        {{ $perkiraan->kode }} - {{ $perkiraan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $jurnalDetail->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="{{ $jurnalDetail->debit }}" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="{{ $jurnalDetail->kredit }}" required>
        </div>
        <a href="{{ route('jurnal_detail.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Faktur Pembelian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Faktur Pembelian</h2>
    <form action="{{ route('faktur_pembelian.update', $fakturPembelian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No Faktur</label>
            <input type="text" name="no_faktur" class="form-control" value="{{ $fakturPembelian->no_faktur }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $fakturPembelian->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Pemasok</label>
            <select name="pemasok_id" class="form-control" required>
                <option value="">-- Pilih Pemasok --</option>
                @foreach($pemasoks as $pemasok)
                    <option value="{{ $pemasok->id }}" {{ $fakturPembelian->pemasok_id == $pemasok->id ? 'selected' : '' }}>
                        {{ $pemasok->kode }} - {{ $pemasok->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Subtotal</label>
            <input type="number" name="subtotal" class="form-control" value="{{ $fakturPembelian->subtotal }}">
        </div>
        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="diskon" class="form-control" value="{{ $fakturPembelian->diskon }}">
        </div>
        <div class="mb-3">
            <label>PPN</label>
            <input type="number" name="ppn" class="form-control" value="{{ $fakturPembelian->ppn }}">
        </div>
        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="form-control" value="{{ $fakturPembelian->total }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                @foreach(['Draft','Confirmed','Received','Void'] as $status)
                    <option value="{{ $status }}" {{ $fakturPembelian->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Bayar</label>
            <select name="status_bayar" class="form-control">
                @foreach(['Belum Bayar','Sebagian','Lunas'] as $statusBayar)
                    <option value="{{ $statusBayar }}" {{ $fakturPembelian->status_bayar == $statusBayar ? 'selected' : '' }}>{{ $statusBayar }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jatuh Tempo</label>
            <input type="date" name="jatuh_tempo" class="form-control" value="{{ $fakturPembelian->jatuh_tempo }}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $fakturPembelian->keterangan }}</textarea>
        </div>
        <a href="{{ route('faktur_pembelian.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
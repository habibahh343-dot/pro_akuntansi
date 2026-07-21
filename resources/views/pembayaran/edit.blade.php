@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Edit Pembayaran</h2>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No Pembayaran</label>
            <input type="text" name="no_pembayaran" class="form-control" value="{{ $pembayaran->no_pembayaran }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pembayaran->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="Penerimaan" {{ $pembayaran->tipe == 'Penerimaan' ? 'selected' : '' }}>Penerimaan</option>
                <option value="Pengeluaran" {{ $pembayaran->tipe == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $pembayaran->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->kode }} - {{ $pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Pemasok</label>
            <select name="pemasok_id" class="form-control">
                <option value="">-- Pilih Pemasok --</option>
                @foreach($pemasoks as $pemasok)
                    <option value="{{ $pemasok->id }}" {{ $pembayaran->pemasok_id == $pemasok->id ? 'selected' : '' }}>
                        {{ $pemasok->kode }} - {{ $pemasok->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $pembayaran->jumlah }}" required>
        </div>
        <div class="mb-3">
            <label>Metode</label>
            <select name="metode" class="form-control" required>
                @foreach(['Tunai','Transfer','Cek','Giro'] as $metode)
                    <option value="{{ $metode }}" {{ $pembayaran->metode == $metode ? 'selected' : '' }}>{{ $metode }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>No Referensi</label>
            <input type="text" name="no_referensi" class="form-control" value="{{ $pembayaran->no_referensi }}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pembayaran->keterangan }}</textarea>
        </div>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
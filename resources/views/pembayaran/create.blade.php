@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pembayaran</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Pembayaran</label>
            <input type="text" name="no_pembayaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="Penerimaan">Penerimaan</option>
                <option value="Pengeluaran">Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->kode }} - {{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Pemasok</label>
            <select name="pemasok_id" class="form-control">
                <option value="">-- Pilih Pemasok --</option>
                @foreach($pemasoks as $pemasok)
                    <option value="{{ $pemasok->id }}">{{ $pemasok->kode }} - {{ $pemasok->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Metode</label>
            <select name="metode" class="form-control" required>
                <option value="Tunai">Tunai</option>
                <option value="Transfer">Transfer</option>
                <option value="Cek">Cek</option>
                <option value="Giro">Giro</option>
            </select>
        </div>
        <div class="mb-3">
            <label>No Referensi</label>
            <input type="text" name="no_referensi" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
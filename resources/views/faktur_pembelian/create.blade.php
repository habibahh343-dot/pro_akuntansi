@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Faktur Pembelian</h2>
    <form action="{{ route('faktur_pembelian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Faktur</label>
            <input type="text" name="no_faktur" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pemasok</label>
            <select name="pemasok_id" class="form-control" required>
                <option value="">-- Pilih Pemasok --</option>
                @foreach($pemasoks as $pemasok)
                    <option value="{{ $pemasok->id }}">{{ $pemasok->kode }} - {{ $pemasok->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Subtotal</label>
            <input type="number" name="subtotal" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="diskon" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>PPN</label>
            <input type="number" name="ppn" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Draft">Draft</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Received">Received</option>
                <option value="Void">Void</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Bayar</label>
            <select name="status_bayar" class="form-control">
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Sebagian">Sebagian</option>
                <option value="Lunas">Lunas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jatuh Tempo</label>
            <input type="date" name="jatuh_tempo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <a href="{{ route('faktur_pembelian.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
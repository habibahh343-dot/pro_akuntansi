@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Edit Faktur Penjualan</h2>
    <form action="{{ route('faktur_penjualan.update', $fakturPenjualan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No Faktur</label>
            <input type="text" name="no_faktur" class="form-control" value="{{ $fakturPenjualan->no_faktur }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $fakturPenjualan->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $fakturPenjualan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->kode }} - {{ $pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Subtotal</label>
            <input type="number" name="subtotal" class="form-control" value="{{ $fakturPenjualan->subtotal }}">
        </div>
        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="diskon" class="form-control" value="{{ $fakturPenjualan->diskon }}">
        </div>
        <div class="mb-3">
            <label>PPN</label>
            <input type="number" name="ppn" class="form-control" value="{{ $fakturPenjualan->ppn }}">
        </div>
        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="form-control" value="{{ $fakturPenjualan->total }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                @foreach(['Draft','Confirmed','Delivered','Void'] as $status)
                    <option value="{{ $status }}" {{ $fakturPenjualan->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Bayar</label>
            <select name="status_bayar" class="form-control">
                @foreach(['Belum Bayar','Sebagian','Lunas'] as $statusBayar)
                    <option value="{{ $statusBayar }}" {{ $fakturPenjualan->status_bayar == $statusBayar ? 'selected' : '' }}>{{ $statusBayar }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jatuh Tempo</label>
            <input type="date" name="jatuh_tempo" class="form-control" value="{{ $fakturPenjualan->jatuh_tempo }}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $fakturPenjualan->keterangan }}</textarea>
        </div>
        <a href="{{ route('faktur_penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Edit Pelanggan</h2>
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $pelanggan->kode }}" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $pelanggan->telepon }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $pelanggan->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>NPWP</label>
            <input type="text" name="npwp" class="form-control" value="{{ $pelanggan->npwp }}">
        </div>
        <div class="mb-3">
            <label>Limit Piutang</label>
            <input type="number" name="limit_piutang" class="form-control" value="{{ $pelanggan->limit_piutang }}">
        </div>
        <div class="mb-3">
            <label>Jatuh Tempo (hari)</label>
            <input type="number" name="jatuh_tempo" class="form-control" value="{{ $pelanggan->jatuh_tempo }}">
        </div>
        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $pelanggan->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$pelanggan->is_active ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pelanggan->keterangan }}</textarea>
        </div>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
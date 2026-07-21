@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Edit Pemasok</h2>
    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $pemasok->kode }}" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pemasok->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pemasok->email }}">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $pemasok->telepon }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $pemasok->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>NPWP</label>
            <input type="text" name="npwp" class="form-control" value="{{ $pemasok->npwp }}">
        </div>
        <div class="mb-3">
            <label>Bank</label>
            <input type="text" name="bank" class="form-control" value="{{ $pemasok->bank }}">
        </div>
        <div class="mb-3">
            <label>No Rekening</label>
            <input type="text" name="no_rekening" class="form-control" value="{{ $pemasok->no_rekening }}">
        </div>
        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $pemasok->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$pemasok->is_active ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pemasok->keterangan }}</textarea>
        </div>
        <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
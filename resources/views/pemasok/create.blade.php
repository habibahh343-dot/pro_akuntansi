@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pemasok</h2>
    <form action="{{ route('pemasok.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>NPWP</label>
            <input type="text" name="npwp" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bank</label>
            <input type="text" name="bank" class="form-control">
        </div>
        <div class="mb-3">
            <label>No Rekening</label>
            <input type="text" name="no_rekening" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Jurnal Umum</h2>
    <form action="{{ route('jurnal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Jurnal</label>
            <input type="text" name="no_jurnal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="Umum">Umum</option>
                <option value="Penyesuaian">Penyesuaian</option>
                <option value="Penutup">Penutup</option>
                <option value="Pembalik">Pembalik</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <a href="{{ route('jurnal.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
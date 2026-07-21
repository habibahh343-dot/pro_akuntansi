@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Edit Jurnal Umum</h2>
    <form action="{{ route('jurnal.update', $jurnal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No Jurnal</label>
            <input type="text" name="no_jurnal" class="form-control" value="{{ $jurnal->no_jurnal }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jurnal->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                @foreach(['Umum','Penyesuaian','Penutup','Pembalik'] as $tipe)
                    <option value="{{ $tipe }}" {{ $jurnal->tipe == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $jurnal->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $jurnal->keterangan }}</textarea>
        </div>
        <a href="{{ route('jurnal.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
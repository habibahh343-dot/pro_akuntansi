@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Jurnal Detail</h2>
    <form action="{{ route('jurnal_detail.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Jurnal</label>
            <select name="jurnal_id" class="form-control" required>
                <option value="">-- Pilih Jurnal --</option>
                @foreach($jurnals as $jurnal)
                    <option value="{{ $jurnal->id }}">{{ $jurnal->no_jurnal }} - {{ $jurnal->deskripsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}">{{ $perkiraan->kode }} - {{ $perkiraan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="0" required>
        </div>
        <a href="{{ route('jurnal_detail.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
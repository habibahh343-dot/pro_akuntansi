@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Edit Buku Besar</h2>
    <form action="{{ route('buku_besar.update', $bukuBesar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}" {{ $bukuBesar->perkiraan_id == $perkiraan->id ? 'selected' : '' }}>
                        {{ $perkiraan->kode }} - {{ $perkiraan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $bukuBesar->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>No Referensi</label>
            <input type="text" name="no_ref" class="form-control" value="{{ $bukuBesar->no_ref }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $bukuBesar->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="{{ $bukuBesar->debit }}" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="{{ $bukuBesar->kredit }}" required>
        </div>
        <div class="mb-3">
            <label>Saldo</label>
            <input type="number" name="saldo" class="form-control" value="{{ $bukuBesar->saldo }}" required>
        </div>
        <div class="mb-3">
            <label>Jurnal Detail</label>
            <select name="jurnal_detail_id" class="form-control">
                <option value="">-- Pilih Jurnal Detail --</option>
                @foreach($jurnalDetails as $detail)
                    <option value="{{ $detail->id }}" {{ $bukuBesar->jurnal_detail_id == $detail->id ? 'selected' : '' }}>
                        {{ $detail->id }} - {{ $detail->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Posisi</label>
            <select name="posisi" class="form-control" required>
                <option value="Debit" {{ $bukuBesar->posisi == 'Debit' ? 'selected' : '' }}>Debit</option>
                <option value="Kredit" {{ $bukuBesar->posisi == 'Kredit' ? 'selected' : '' }}>Kredit</option>
            </select>
        </div>
        <a href="{{ route('buku_besar.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Edit Laporan Keuangan</h2>
    <form action="{{ route('laporan_keuangan.update', $laporanKeuangan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                @foreach(['Neraca','Laba Rugi','Arus Kas','Perubahan Ekuitas'] as $tipe)
                    <option value="{{ $tipe }}" {{ $laporanKeuangan->tipe == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Bulan</label>
            <select name="periode_bulan" class="form-control" required>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $laporanKeuangan->periode_bulan == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Tahun</label>
            <input type="number" name="periode_tahun" class="form-control" value="{{ $laporanKeuangan->periode_tahun }}" required>
        </div>
        <div class="mb-3">
            <label>Data (JSON)</label>
            <textarea name="data" class="form-control" rows="5">{{ $laporanKeuangan->data }}</textarea>
        </div>
        <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
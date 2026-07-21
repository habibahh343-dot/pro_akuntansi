@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Tambah Saldo Akun</h2>
    <form action="{{ route('saldo_akun.store') }}" method="POST">
        @csrf
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
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" required>
        </div>
        <div class="mb-3">
            <label>Bulan</label>
            <select name="bulan" class="form-control" required>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Debit</label>
            <input type="number" name="debit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Kredit</label>
            <input type="number" name="kredit" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Saldo Akhir</label>
            <input type="number" name="saldo_akhir" class="form-control" value="0" required>
        </div>
        <a href="{{ route('saldo_akun.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
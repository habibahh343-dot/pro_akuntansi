@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Edit Neraca Saldo</h2>
    <form action="{{ route('neraca_saldo.update', $neracaSaldo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Perkiraan</label>
            <select name="perkiraan_id" class="form-control" required>
                <option value="">-- Pilih Perkiraan --</option>
                @foreach($perkiraans as $perkiraan)
                    <option value="{{ $perkiraan->id }}" {{ $neracaSaldo->perkiraan_id == $perkiraan->id ? 'selected' : '' }}>
                        {{ $perkiraan->kode }} - {{ $perkiraan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Periode Bulan</label>
            <input type="number" name="periode_bulan" class="form-control" value="{{ $neracaSaldo->periode_bulan }}" min="1" max="12" required>
        </div>
        <div class="mb-3">
            <label>Periode Tahun</label>
            <input type="number" name="periode_tahun" class="form-control" value="{{ $neracaSaldo->periode_tahun }}" required>
        </div>
        <div class="mb-3">
            <label>Saldo Debit</label>
            <input type="number" name="saldo_debit" class="form-control" value="{{ $neracaSaldo->saldo_debit }}" required>
        </div>
        <div class="mb-3">
            <label>Saldo Kredit</label>
            <input type="number" name="saldo_kredit" class="form-control" value="{{ $neracaSaldo->saldo_kredit }}" required>
        </div>
        <a href="{{ route('neraca_saldo.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
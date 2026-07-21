@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Tambah Perkiraan</h2>
    <form action="{{ route('perkiraan.store') }}" method="POST">
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
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="Aktiva">Aktiva</option>
                <option value="Kewajiban">Kewajiban</option>
                <option value="Ekuitas">Ekuitas</option>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Beban">Beban</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Posisi Normal</label>
            <select name="posisi_normal" class="form-control" required>
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Tidak Ada --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->kode }} - {{ $parent->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Level</label>
            <input type="number" name="level" class="form-control" value="1">
        </div>
        <div class="mb-3">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Is Detail</label>
            <select name="is_detail" class="form-control">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <a href="{{ route('perkiraan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
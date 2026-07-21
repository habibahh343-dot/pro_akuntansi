@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')

<div class="container mt-4">
    <h2>Data Neraca Saldo</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('neraca_saldo.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Perkiraan</th>
                <th>Periode Bulan</th>
                <th>Periode Tahun</th>
                <th>Saldo Debit</th>
                <th>Saldo Kredit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($neracaSaldos as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->perkiraan->nama }}</td>
                <td>{{ $item->periode_bulan }}</td>
                <td>{{ $item->periode_tahun }}</td>
                <td>Rp {{ number_format($item->saldo_debit, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item->saldo_kredit, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('neraca_saldo.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('neraca_saldo.destroy', $item->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
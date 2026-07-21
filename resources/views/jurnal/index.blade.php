@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Data Jurnal Umum</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('jurnal.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Jurnal</th>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurnals as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->no_jurnal }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('jurnal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jurnal.destroy', $item->id) }}" method="POST" style="display:inline">
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
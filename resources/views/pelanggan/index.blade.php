@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Data Pelanggan</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>NPWP</th>
                <th>Limit Piutang</th>
                <th>Jatuh Tempo</th>
                <th>Aktif</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->npwp }}</td>
                <td>Rp {{ number_format($item->limit_piutang, 2, ',', '.') }}</td>
                <td>{{ $item->jatuh_tempo }} hari</td>
                <td>{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display:inline">
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
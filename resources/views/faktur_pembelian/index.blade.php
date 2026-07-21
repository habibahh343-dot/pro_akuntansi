@extends('layouts.app')

@section('title', 'Data Perkiraan / Chart of Account')

@section('content')
<div class="container mt-4">
    <h2>Data Faktur Pembelian</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('faktur_pembelian.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Faktur</th>
                <th>Tanggal</th>
                <th>Pemasok</th>
                <th>Subtotal</th>
                <th>Diskon</th>
                <th>PPN</th>
                <th>Total</th>
                <th>Status</th>
                <th>Status Bayar</th>
                <th>Jatuh Tempo</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakturs as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->no_faktur }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->pemasok->nama }}</td>
                <td>Rp {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item->diskon, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item->ppn, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->status_bayar }}</td>
                <td>{{ $item->jatuh_tempo }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('faktur_pembelian.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('faktur_pembelian.destroy', $item->id) }}" method="POST" style="display:inline">
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
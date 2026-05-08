<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Pembayaran</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Pembayaran</th>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Pelanggan</th>
                <th>Pemasok</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>No Referensi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->no_pembayaran }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                <td>{{ $item->pemasok->nama ?? '-' }}</td>
                <td>Rp {{ number_format($item->jumlah, 2, ',', '.') }}</td>
                <td>{{ $item->metode }}</td>
                <td>{{ $item->no_referensi ?? '-' }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('pembayaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" style="display:inline">
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
</body>
</html>
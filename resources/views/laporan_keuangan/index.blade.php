<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Laporan Keuangan</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('laporan_keuangan.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe</th>
                <th>Periode Bulan</th>
                <th>Periode Tahun</th>
                <th>Generated At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->periode_bulan }}</td>
                <td>{{ $item->periode_tahun }}</td>
                <td>{{ $item->generated_at }}</td>
                <td>
                    <a href="{{ route('laporan_keuangan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('laporan_keuangan.destroy', $item->id) }}" method="POST" style="display:inline">
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
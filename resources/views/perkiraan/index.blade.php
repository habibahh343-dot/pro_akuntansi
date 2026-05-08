<!DOCTYPE html>
<html>
<head>
    <title>Data Perkiraan / Chart of Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Perkiraan / Chart of Account</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('perkiraan.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Posisi Normal</th>
                <th>Parent</th>
                <th>Level</th>
                <th>Detail</th>
                <th>Aktif</th>
                <th>Saldo Awal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perkiraans as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->posisi_normal }}</td>
                <td>{{ $item->parent ? $item->parent->nama : '-' }}</td>
                <td>{{ $item->level }}</td>
                <td>{{ $item->is_detail ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                <td>Rp {{ number_format($item->saldo_awal, 2, ',', '.') }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('perkiraan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perkiraan.destroy', $item->id) }}" method="POST" style="display:inline">
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
<!DOCTYPE html>
<html>
<head>
    <title>Data Jurnal Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Jurnal Detail</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('jurnal_detail.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Jurnal</th>
                <th>Perkiraan</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurnalDetails as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->jurnal->no_jurnal }}</td>
                <td>{{ $item->perkiraan->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp {{ number_format($item->debit, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item->kredit, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('jurnal_detail.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jurnal_detail.destroy', $item->id) }}" method="POST" style="display:inline">
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
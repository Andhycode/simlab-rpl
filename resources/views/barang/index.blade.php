<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>

    <h1>Daftar Barang</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('barang.create') }}">Tambah Barang</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Kondisi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse ($barangs as $barang)
            <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->kategori->nama_kategori }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->kondisi }}</td>
                <td>{{ $barang->status }}</td>
                <td><a href="{{ route('barang.edit', $barang) }}">Edit</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada barang.</td>
            </tr>
        @endforelse
    </table>

</body>
</html>
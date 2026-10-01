<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>

    <h1>Edit Barang</h1>

    <form action="{{ route('barang.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Barang</label>
        <input
            type="text"
            name="kode_barang"
            value="{{ old('kode_barang', $barang->kode_barang) }}"
        >

        @error('kode_barang')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Nama Barang</label>
        <input
            type="text"
            name="nama_barang"
            value="{{ old('nama_barang', $barang->nama_barang) }}"
        >

        @error('nama_barang')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Kategori</label>
        <select name="kategori_id">
            @foreach ($kategoris as $kategori)
                <option
                    value="{{ $kategori->id }}"
                    {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}
                >
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        @error('kategori_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Stok</label>
        <input
            type="number"
            name="stok"
            value="{{ old('stok', $barang->stok) }}"
        >

        @error('stok')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Kondisi</label>
        <select name="kondisi">
            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>
                Baik
            </option>
            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
                Rusak Ringan
            </option>
            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
                Rusak Berat
            </option>
        </select>

        @error('kondisi')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Status</label>
        <select name="status">
            <option value="Tersedia" {{ old('status', $barang->status) == 'Tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>
            <option value="Dipinjam" {{ old('status', $barang->status) == 'Dipinjam' ? 'selected' : '' }}>
                Dipinjam
            </option>
            <option value="Maintenance" {{ old('status', $barang->status) == 'Maintenance' ? 'selected' : '' }}>
                Maintenance
            </option>
        </select>

        @error('status')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Spesifikasi</label>
        <textarea name="spesifikasi">{{ old('spesifikasi', $barang->spesifikasi) }}</textarea>

        @error('spesifikasi')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Update</button>

    </form>

</body>
</html>
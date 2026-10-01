<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>

    <h1>Tambah Barang</h1>

    @if (session('success'))
      <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label>Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ old('kode_barang') }}">
        @error('kode_barang')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}">
        @error('nama_barang')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Kategori</label>
        <select name="kategori_id">
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"{{ old('kategori_id') == $kategori->id ? ' selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Stok</label>
        <input type="number" name="stok" value="{{ old('stok') }}">
        @error('stok')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Kondisi</label>
        <select name="kondisi">
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>
        @error('kondisi')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Status</label>
        <select name="status">
            <option value="Tersedia">Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Maintenance">Maintenance</option>
        </select>
        @error('status')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Spesifikasi</label>
        <textarea name="spesifikasi">{{ old('spesifikasi') }}</textarea>
        @error('spesifikasi')
          <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
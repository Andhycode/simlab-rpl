<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Barang</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
  <div class="max-w-3xl mx-auto px-4 py-8">
    <div class="mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Tambah Barang</h1>
      <p class="text-gray-500 mt-1">Tambahkan barang baru ke inventaris Lab RPL.</p>
    </div>
    @if (session('success'))
      <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
      </div>
    @endif
    <div class="bg-white rounded-lg shadow p-6">
      <form action="{{ route('barang.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <label class="block font-medium text-gray-700 mb-1">Kode Barang</label>
          <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          @error('kode_barang')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Nama Barang</label>
          <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          @error('nama_barang')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Kategori</label>
          <select name="kategori_id"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach ($kategoris as $kategori)
              <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? ' selected' : '' }}>
                {{ $kategori->nama_kategori }}
              </option>
            @endforeach
          </select>
          @error('kategori_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Stok</label>
          <input type="number" name="stok" value="{{ old('stok') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          @error('stok')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Kondisi</label>
          <select name="kondisi"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
          </select>
          @error('kondisi')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Status</label>
          <select name="status"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
          </select>
          @error('status')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block font-medium text-gray-700 mb-1">Spesifikasi</label>
          <textarea name="spesifikasi"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ old('spesifikasi') }}
          </textarea>
          @error('spesifikasi')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
            Simpan Barang
          </button>
          <a href="{{ route('barang.index') }}"
            class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg text-center hover:bg-gray-300">
            Batal
          </a>
        </div>

      </form>
    </div>
  </div>
</body>

</html>
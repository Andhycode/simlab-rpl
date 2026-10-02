<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Barang</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
  <div class="max-w-7xl mx-auto px-4 py-8">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Inventaris Lab RPL</h1>
        <p class="text-gray-500 mt-1">Daftar barang laboratorium</p>
      </div>
    </div>

    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <a href="{{ route('dashboard') }}"
        class="rounded-lg bg-gray-600 px-4 py-2.5 font-medium text-white hover:bg-gray-700">
        ← Dashboard
      </a>
      <a href="{{ route('barang.create') }}"
        class="rounded-lg bg-blue-600 px-4 py-2.5 font-medium text-white hover:bg-blue-700">
        + Tambah Barang
      </a>
    </div>

    @if (session('success'))
      <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
      </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <div class="overflow-x-auto">

        <table class="w-full min-w-[800px]">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="px-4 py-3 text-left">Kode</th>
              <th class="px-4 py-3 text-left">Nama</th>
              <th class="px-4 py-3 text-left">Kategori</th>
              <th class="px-4 py-3 text-left">Stok</th>
              <th class="px-4 py-3 text-left">Kondisi</th>
              <th class="px-4 py-3 text-left">Status</th>
              <th class="px-4 py-3 text-left">Aksi</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @forelse ($barangs as $barang)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                  {{ $barang->kode_barang }}
                </td>
                <td class="px-4 py-3 font-medium">
                  {{ $barang->nama_barang }}
                </td>
                <td class="px-4 py-3">
                  {{ $barang->kategori->nama_kategori }}
                </td>
                <td class="px-4 py-3">
                  {{ $barang->stok }}
                </td>
                <td class="px-4 py-3">
                  {{ $barang->kondisi }}
                </td>
                <td class="px-4 py-3">
                  @if ($barang->status === 'Tersedia')
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-sm">
                      Tersedia
                    </span>
                  @elseif ($barang->status === 'Dipinjam')
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-sm">
                      Dipinjam
                    </span>
                  @else
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-sm">
                      Maintenance
                    </span>
                  @endif
                </td>
                <td class="px-4 py-3">
                  <div class="flex gap-2">
                    <a href="{{ route('barang.edit', $barang) }}"
                      class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                      Edit
                    </a>
                    <form action="{{ route('barang.destroy', $barang) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada barang.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

      </div>
    </div>

  </div>
</body>

</html>
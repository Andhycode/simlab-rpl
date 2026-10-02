<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard SIMLAB-RPL</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

  <div class="mx-auto min-h-screen max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800">
        SIMLAB-RPL
      </h1>
      <p class="mt-1 text-gray-600">
        Sistem Manajemen Inventaris Lab RPL
      </p>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

      <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-gray-500">
          Total Aset
        </p>
        <p class="mt-2 text-3xl font-bold text-gray-800">
          {{ $totalAset }}
        </p>
      </div>

      <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-gray-500">
          Unit Tersedia
        </p>
        <p class="mt-2 text-3xl font-bold text-emerald-600">
          {{ $unitTersedia }}
        </p>
      </div>

      <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-gray-500">
          Unit Dipinjam / Maintenance
        </p>
        <p class="mt-2 text-3xl font-bold text-rose-600">
          {{ $unitDipinjamMaintenance }}
        </p>
      </div>

    </div>

    <div class="mt-8 rounded-xl bg-white p-6 shadow">

      <h2 class="text-xl font-bold text-gray-800">
        Menu Inventaris
      </h2>

      <p class="mt-1 text-gray-500">
        Kelola data barang laboratorium.
      </p>

      <div class="mt-5 flex flex-wrap gap-3">

        <a href="{{ route('barang.index') }}"
          class="rounded-lg bg-blue-600 px-5 py-2.5 font-medium text-white hover:bg-blue-700">
          Lihat Data Barang
        </a>

        <a href="{{ route('barang.create') }}"
          class="rounded-lg bg-green-600 px-5 py-2.5 font-medium text-white hover:bg-green-700">
          + Tambah Barang
        </a>

      </div>

    </div>

  </div>

</body>

</html>
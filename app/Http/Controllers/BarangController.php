<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{

    public function dashboard()
    {
        //
    }

    public function index()
    {
        
        $barangs = Barang::with('kategori')->get();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
    
        $kategoris = Kategori::all();

        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.create')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();

        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        //
    }
}

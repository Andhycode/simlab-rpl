<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kategori::create([
            'nama_kategori' => 'Komputer & Laptop',
            'deskripsi' => 'Perangkat komputer dan laptop untuk praktik.',
        ]);

        Kategori::create([
            'nama_kategori' => 'Perangkat Jaringan',
            'deskripsi' => 'Perangkat yang digunakan untuk praktik jaringan.',
        ]);

        Kategori::create([
            'nama_kategori' => 'Alat Perkabelan',
            'deskripsi' => 'Alat dan perlengkapan untuk membuat kabel jaringan.',
        ]);

        Kategori::create([
            'nama_kategori' => 'Multimedia',
            'deskripsi' => 'Perangkat multimedia untuk kegiatan praktik.',
        ]);
    }
}

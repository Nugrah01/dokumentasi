<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HalamanSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriId = DB::table('kategori')->first()->id;

        DB::table('halaman')->insert([
            'judul' => 'Dokumentasi',
            'kategori_id' => $kategoriId,
            'deskripsi' => 'Halaman Dokumentasi',
            'jawaban' => 'Konten dokumentasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
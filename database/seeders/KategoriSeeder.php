<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'bagian_id' => 1, // pastikan bagian_id ini ada
                'judul' => 'Item',
                'konten' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
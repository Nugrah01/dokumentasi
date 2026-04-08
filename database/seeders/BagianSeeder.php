<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Setup',
            'Inventori',
            'Core',
            'Alva Store',
            'Finance',
            'CRM',
            'Next JS',
            'HRD'
        ];

        foreach ($data as $judul) {
            DB::table('bagian')->insert([
                'judul' => $judul,
                'deskripsi' => null,
                // 'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
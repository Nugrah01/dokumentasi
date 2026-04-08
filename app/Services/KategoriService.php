<?php

namespace App\Services;

use App\Models\Kategori;

class KategoriService
{
    public function getAll()
    {
        return Kategori::latest()->paginate(10);
    }

    public function getById(int $id)
    {
        return Kategori::findOrFail($id);
    }

    public function store(array $data)
    {
        return Kategori::create([
            'bagian_id' => $data['bagian_id'],
            'judul' => $data['judul'],
            'konten' => $data['konten'] ?? null
        ]);
    }

    public function update(int $id, array $data)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'bagian_id' => $data['bagian_id'] ?? $kategori->bagian_id,
            'judul' => $data['judul'] ?? $kategori->judul,
            'konten' => $data['konten'] ?? $kategori->konten
        ]);

        return $kategori;
    }

    public function delete(int $id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->halaman()->exists()) {
            throw new \Exception('Kategori masih memiliki halaman.');
        }

        $kategori->delete();

        return true;
    }
}
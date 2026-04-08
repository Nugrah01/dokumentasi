<?php

namespace App\Services;

use App\Models\Halaman;

class HalamanService
{
    public function getAll()
    {
        return Halaman::with('kategori.bagian')->latest()->paginate(10);
    }

    public function getById(int $id)
    {
        return Halaman::with('kategori.bagian')->findOrFail($id);
    }

    public function store(array $data)
    {
        return Halaman::create([
            'kategori_id' => $data['kategori_id'],
            'deskripsi' => $data['deskripsi'],
            'jawaban' => $data['jawaban'],
            'status' => $data['status']
        ]);
    }

    public function update(int $id, array $data)
    {
        $halaman = Halaman::findOrFail($id);
        $halaman->update($data);

        return $halaman;
    }

    public function delete(int $id)
    {
        $halaman = Halaman::findOrFail($id);
        $halaman->delete();

        return true;
    }
}
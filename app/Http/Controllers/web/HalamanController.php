<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\HalamanService;
use App\Http\Requests\Halaman\StoreHalamanRequest;
use App\Http\Requests\Halaman\UpdateHalamanRequest;
use Illuminate\Http\Request;
use App\Models\Halaman;
use App\Models\Bagian;
use Illuminate\Support\Facades\Log;

class HalamanController extends Controller
{
    public function __construct(
        protected HalamanService $service
    ) {}

    public function index()
    {
        $data     = $this->service->getAll();
        $kategori = \App\Models\Kategori::all();

        return view('auth.halaman.halaman', compact('data', 'kategori'));
    }


    public function show($id)
    {
        \Log::info('=== HALAMAN SHOW START ===');
        \Log::info('Halaman ID: ' . $id);

        $halaman = Halaman::with('kategori.bagian')->findOrFail($id);

        \Log::info('Halaman Data:', [
            'id' => $halaman->id,
            'deskripsi' => $halaman->deskripsi,
            'kategori' => $halaman->kategori ? $halaman->kategori->toArray() : null,
        ]);

        $bagian = Bagian::with([
            'kategori.halaman' => function ($query) {
                $query->where('status', Halaman::STATUS_PUBLISH);
            }
        ])->get();

        \Log::info('Bagian Count: ' . $bagian->count());
        \Log::info('=== HALAMAN SHOW END ===');

        return view('halaman.show', compact('halaman', 'bagian'));
    }

    public function byBagian($bagianId)
    {
        return response()->json(
            \App\Models\Kategori::where('bagian_id', $bagianId)->get()
        );
    }

    public function create()
    {
        $kategori = \App\Models\Kategori::all();
        $bagian   = \App\Models\Bagian::all();

        return view('auth.halaman.store', compact('kategori', 'bagian'));
    }

    public function store(StoreHalamanRequest $request)
    {
        try {

            $this->service->store($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Dokumentasi berhasil ditambahkan',
                'notif'   => [
                    'message' => 'Dokumentasi berhasil ditambahkan',
                    'type'    => 'success',
                ],
            ]);

        } catch (\Throwable $e) {

            Log::error('Gagal menambahkan halaman', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data',
                'notif'   => [
                    'message' => 'Gagal menambahkan dokumentasi',
                    'type'    => 'danger',
                ],
            ], 500);
        }
    }

    public function edit($id)
    {
        $halaman  = $this->service->getById($id)->load('kategori.bagian');
        $kategori = \App\Models\Kategori::all();
        $bagian   = \App\Models\Bagian::all();

        return view('auth.halaman.edit', compact('halaman', 'kategori', 'bagian'));
    }

    public function update(UpdateHalamanRequest $request, $id)
    {
        try {

            $this->service->update($id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Dokumentasi berhasil diperbarui',
                'notif'   => [
                    'message' => 'Dokumentasi berhasil diperbarui',
                    'type'    => 'success',
                ],
            ]);

        } catch (\Throwable $e) {

            Log::error('Gagal update halaman', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data',
                'notif'   => [
                    'message' => 'Gagal memperbarui dokumentasi',
                    'type'    => 'danger',
                ],
            ], 500);
        }
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()
            ->route('halaman.index')
            ->with('notif_toast', json_encode([
                'message' => 'Dokumentasi berhasil dihapus',
                'type'    => 'danger',
            ]));
    }
}
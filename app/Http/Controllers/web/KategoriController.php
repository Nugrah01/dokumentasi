<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\KategoriService;
use App\Http\Requests\Kategori\StoreKategoriRequest;
use App\Http\Requests\Kategori\UpdateKategoriRequest;
use App\Models\Kategori;
use App\Models\Bagian;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct(
        protected KategoriService $service
    ) {}

    public function index()
    {
        $data = Kategori::withCount('halaman')
            ->latest()
            ->paginate(10);

        return view('auth.kategori.kategori', compact('data'));
    }

    public function create()
    {
        $bagian = Bagian::all();

        return view('auth.kategori.create', compact('bagian'));
    }

    public function store(StoreKategoriRequest $request)
    {
        $this->service->store($request->validated());

        // Jika request dari fetch/ajax
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil dibuat',
            ]);
        }

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dibuat');
    }

    public function byBagian($bagianId)
    {
        $kategori = Kategori::where('bagian_id', $bagianId)
            ->select('id', 'judul')
            ->orderBy('judul')
            ->get();

        return response()->json($kategori);
    }

    public function edit($id)
    {
        $kategori = $this->service->getById($id);
        $bagian   = Bagian::all();

        return view('auth.kategori.edit', compact('kategori', 'bagian'));
    }

    public function update(UpdateKategoriRequest $request, $id)
    {
        $this->service->update($id, $request->validated());

        // Jika request dari fetch/ajax
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil diperbarui',
            ]);
        }

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::withCount('halaman')->findOrFail($id);

        if ($kategori->halaman_count > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak bisa dihapus karena masih digunakan.',
            ], 422);
        }

        $this->service->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
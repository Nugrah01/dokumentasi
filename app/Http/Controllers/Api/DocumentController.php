<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\Halaman;

class DocumentController extends Controller
{
    public function index()
    {
        $data = Halaman::with(['kategori', 'bagian'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->jawaban = $this->fixImageUrl($item->jawaban);
                return $item;
            });

        return ApiResponse::success($data);
    }

    public function show($id)
    {
        $halaman = Halaman::with(['kategori', 'bagian'])->findOrFail($id);

        // ✅ FIX di sini
        $halaman->jawaban = $this->fixImageUrl($halaman->jawaban);

        return ApiResponse::success($halaman);
    }

    public function filter($status)
    {
        $data = Halaman::with(['kategori', 'bagian'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->jawaban = $this->fixImageUrl($item->jawaban);
                return $item;
            });

        return ApiResponse::success($data);
    }

    /**
     * 🔧 Fix URL gambar dari /storage → full URL
     */
    private function fixImageUrl(?string $html): ?string
    {
        if (!$html) return $html;

        $baseUrl = config('app.url'); // contoh: http://127.0.0.1:8000

        return preg_replace(
            '/src="\/storage/',
            'src="' . $baseUrl . '/storage',
            $html
        );
    }
}
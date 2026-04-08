<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Halaman;

class PublicHalamanController extends Controller
{
    public function show($id)
    {
        $halaman = Halaman::with(['kategori.bagian'])
            ->where('status', 'publish') // 🔒 hanya publish
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $halaman
        ]);
    }
}
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use App\Models\Document;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{
    public function index()
    {
        $docs = Halaman::latest()->get();

        // Tambahkan return JSON jika request dari API
        if (request()->expectsJson()) {
            return response()->json(['data' => $docs]);
        }

        return view('dashboard', compact('docs'));
    }

    public function show($id)
    {
        $halaman = Halaman::with(['kategori', 'bagian'])
            ->findOrFail($id);

        return view('auth.dokumentasi', compact('halaman'));
    }

    public function draft()
    {
        $halaman = Halaman::where('status', Halaman::STATUS_DRAFT)
            ->latest()
            ->get();

        return view('auth.dokumentasi.dokumentasi-draft', compact('halaman'));
    }

    public function delete()
    {
        $halaman = Halaman::where('status', Halaman::STATUS_ARCHIVED)
            ->latest()
            ->get();

        return view('auth.dokumentasi.dokumentasi-delete', compact('halaman'));
    }

    public function filter(string $status): JsonResponse
    {
        $allowedStatus = ['publish', 'draft', 'delete'];

        if (!in_array($status, $allowedStatus)) {
            return response()->json([
                'message' => 'Status tidak valid'
            ], 400);
        }

        // Sesuaikan kolom dengan yang ada di tabel halaman.
        // Jika tabel kamu tidak punya kolom 'judul', hapus dari select
        // dan gunakan 'deskripsi' sebagai judul di frontend.
        $data = Halaman::where('status', $status)
            ->latest()
            ->get([
                'id',
                'deskripsi', // dipakai sebagai judul jika kolom 'judul' tidak ada
                'status',
                // tambahkan 'judul' di sini jika kolom tersebut ada di tabel kamu
                // 'judul',
            ]);

        return response()->json([
            'data' => $data
        ]);

        $docs = Halaman::where('status', $status)->latest()->get();

    return response()->json(['data' => $docs]);
    }

    
}
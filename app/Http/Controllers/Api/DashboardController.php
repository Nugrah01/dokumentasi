<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\Halaman;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalHalaman = Halaman::count();
        $totalKategori = Kategori::count();

        // Debug log
        \Log::info('Dashboard Stats', [
            'totalHalaman' => $totalHalaman,
            'totalKategori' => $totalKategori,
        ]);

        return ApiResponse::success([
            'user'           => $request->user(),
            'totalHalaman'   => $totalHalaman,
            'totalKategori' => $totalKategori,
        ]);
    }

    /**
     * Get notifications from recent activities in halaman and kategori
     */
    public function notifikasi()
    {
        try {
            \Log::info('=== FETCH NOTIFIKASI START ===');

            // Ambil aktivitas halaman terbaru (create/update)
            $halamanAktivitas = Halaman::select([
                'id',
                'deskripsi',
                'created_at',
                'updated_at'
            ])
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => 'halaman_' . $item->id,
                    'judul' => 'Dokumentasi Update',
                    'message' => $item->deskripsi ?? 'Tanpa judul',
                    'type' => 'success',
                    'created_at' => $item->updated_at,
                ];
            });

            \Log::info('Halaman Aktivitas Count: ' . $halamanAktivitas->count());

            // Ambil aktivitas kategori terbaru (create/update)
            $kategoriAktivitas = Kategori::select([
                'id',
                'judul',
                'created_at',
                'updated_at'
            ])
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => 'kategori_' . $item->id,
                    'judul' => 'Kategori Update',
                    'message' => $item->judul,
                    'type' => 'edit',
                    'created_at' => $item->updated_at,
                ];
            });

            \Log::info('Kategori Aktivitas Count: ' . $kategoriAktivitas->count());

            // Gabungkan dan urutkan berdasarkan waktu (gunakan timestamp untuk sorting)
            $allNotifications = $halamanAktivitas
                ->concat($kategoriAktivitas)
                ->map(function ($item) {
                    // Konversi ke timestamp untuk sorting
                    $timestamp = strtotime($item['created_at']);
                    return array_merge($item, ['_timestamp' => $timestamp]);
                })
                ->sortByDesc('_timestamp')
                ->take(10)
                ->map(function ($item) {
                    // Hapus field temporary
                    unset($item['_timestamp']);
                    return $item;
                })
                ->values();

            \Log::info('All Notifications Count: ' . $allNotifications->count());
            \Log::info('All Notifications: ' . json_encode($allNotifications));
            \Log::info('=== FETCH NOTIFIKASI END ===');

            return ApiResponse::success($allNotifications);

        } catch (\Exception $e) {
            \Log::error('Error fetch notifikasi: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return ApiResponse::error($e->getMessage(), 500);
        }
    }
}
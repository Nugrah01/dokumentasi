<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {

            // Ambil jumlah berdasarkan status
            $stats = Halaman::select('status', DB::raw('COUNT(*) as total'))
                ->groupBy('status')
                ->pluck('total', 'status')
                ->toArray();

            $totalDipublish = $stats['publish'] ?? 0;
            $totalDraft     = $stats['draft'] ?? 0;
            $totalDelete    = $stats['delete'] ?? 0;

            // Semua dokumen terbaru (tanpa filter status)
            $dokumens = Halaman::orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

            return view('auth.dashboard', compact(
                'totalDipublish',
                'totalDraft',
                'totalDelete',
                'dokumens'
            ));

        } catch (\Throwable $e) {

            Log::error('Dashboard Error', [
                'message' => $e->getMessage()
            ]);

            return view('auth.dashboard', [
                'totalDipublish' => 0,
                'totalDraft'     => 0,
                'totalDelete'    => 0,
                'dokumens'       => collect()
            ]);
        }
    }
}
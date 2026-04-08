<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\HalamanController;
use App\Http\Controllers\EditorController;
// use App\Http\Controllers\Web\DocumentController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\PublicHalamanController;
use App\Models\Bagian;

// PUBLIC (tanpa login)
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'kategori']);
// PUBLIC (tanpa login)
Route::get('/public/halaman/{id}', [HalamanController::class, 'show']);
Route::get('/halaman/{id}', [HalamanController::class, 'show']);

Route::get('/sidebar', function () {
    return \App\Helpers\ApiResponse::success(
        Bagian::with('kategori.halaman')->get()
    );
});

Route::match(['GET', 'OPTIONS'], '/image/{filename}', function ($filename) {
    // Handle preflight OPTIONS
    if (request()->getMethod() === 'OPTIONS') {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Authorization, Content-Type')
            ->header('Access-Control-Max-Age', '86400');
    }

    $path = storage_path('app/public/editor-images/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Access-Control-Allow-Origin' => '*',
    ]);
});

Route::prefix('admin')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum','admin'])->group(function () {

        Route::get('/dokumentasi', [DocumentController::class, 'index']);
        Route::get('/dokumentasi/{id}', [DocumentController::class, 'show']);
        Route::get('/dokumentasi/filter/{status}', [DocumentController::class, 'filter']);

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/dashboard', [DashboardController::class, 'index']);

        // ✅ HALAMAN (FIX)
        Route::prefix('halaman')->group(function () {
            Route::get('/', [HalamanController::class,'index']);
            Route::get('/{id}', [HalamanController::class,'show']);
            Route::post('/', [HalamanController::class,'store']);
            Route::put('/{id}', [HalamanController::class,'update']);
            Route::delete('/{id}', [HalamanController::class,'destroy']);
        });

        // ✅ KATEGORI (FIX - DIPISAH)
        Route::prefix('kategori')->group(function () {
            Route::get('/', [KategoriController::class,'index']);
            Route::get('/{id}', [KategoriController::class,'show']);
            Route::post('/', [KategoriController::class,'store']);
            Route::put('/{id}', [KategoriController::class,'update']);
            Route::delete('/{id}', [KategoriController::class,'destroy']);
        });

        Route::get('/bagian', function () {
            return \App\Helpers\ApiResponse::success(\App\Models\Bagian::all());
        });
        Route::get('/kategori/by-bagian/{id}', [KategoriController::class, 'byBagian']);

        // ── NOTIFIKASI ────────────────────────────────────────────
        // Notifikasi diambil dari aktivitas terbaru di halaman dan kategori
        Route::get('/notifikasi', [DashboardController::class, 'notifikasi']);

        Route::post('/editor/upload', [EditorController::class, 'upload']);
    });
});
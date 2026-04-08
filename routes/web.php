<?php

use Illuminate\Support\Facades\Route;
use llluminate\Http\Request;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KategoriController;
use App\Http\Controllers\web\HalamanController;
use App\Http\Controllers\Web\EditorUploadController;
use App\Http\Controllers\Web\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which contains the "web" middleware
| group. Now create something great!
|
*/

// halaman login dan register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// halaman dashboard user
Route::get('/', function () {return view('dashboard');});
Route::get('/kategori', [KategoriController::class, 'kategori']);
Route::get('/halaman/{id}', [HalamanController::class, 'show'])->name('halaman.show');

// Fix CORS untuk storage files (Flutter Web development)
    Route::options('/storage/{path}', function () {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Authorization, Content-Type, Accept');
    })->where('path', '.*');

    Route::get('/storage/{path}', function ($path) {
        $fullPath = storage_path('app/public/' . $path);

        if (!file_exists($fullPath)) {
            abort(404);
        }

        return response()->file($fullPath, [
            'Access-Control-Allow-Origin'  => '*',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Access-Control-Allow-Headers' => 'Authorization, Content-Type, Accept',
        ]);
    })->where('path', '.*');

// halaman dashboard admin
Route::middleware(['admin'])->group(function () {

    Route::get('/auth/dashboard', [DashboardController::class, 'index'])
        ->name('auth.dashboard');
 
    Route::get('/auth/dokumentasi/filter/{status}', [DocumentController::class, 'filter']);

    Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

    // CRUD HALAMAN
    Route::resource('auth/halaman', HalamanController::class);

    // CRUD KATEGORI
    Route::resource('auth/kategori', KategoriController::class);

    // upload gambar untuk editor
    Route::post('/editor/upload', [EditorUploadController::class, 'upload'])
        ->name('editor.upload');

    // ambil kategori berdasarkan bagian
    Route::get('/auth/kategori/by-bagian/{bagianId}', [KategoriController::class, 'byBagian'])
        ->name('kategori.byBagian');

    Route::get('/dokumentasi', [DocumentController::class, 'index'])
        ->name('dokumentasi.index');

    Route::get('/dokumentasi/dokumentasi/{status}', [DocumentController::class, 'show'])
        ->name('dokumentasi.show');

    Route::get('/dokumentasi/draft', [DocumentController::class,'draft'])->name('dokumentasi.draft');

    Route::get('/dokumentasi/delete', [DocumentController::class,'delete'])->name('dokumentasi.delete');

});

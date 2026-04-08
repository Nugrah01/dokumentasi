<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Kategori;
use App\Models\Bagian;
use App\Models\Halaman;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.sidebar', function ($view) {
            $bagian = Bagian::orderBy('judul')->get();
            $view->with('bagian', $bagian);
        });

            View::composer('layouts.sidebar', function ($view) {
                $kategori = Kategori::orderBy('judul')->get();
                $view->with('kategori', $kategori);
            });
            
            View::composer('layouts.sidebar', function ($view) {
                $halaman = Halaman::orderBy('deskripsi')->get();
                $view->with('halaman', $halaman);
            });
    }
}

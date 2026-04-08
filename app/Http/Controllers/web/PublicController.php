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

class PublicController extends Controller
{
    public function __construct(
        protected HalamanService $service
    ) {}

    public function show($id)
    {
        $halaman = Halaman::with('kategori.bagian')->findOrFail($id);

        $bagian = Bagian::with([
            'kategori.halaman' => function ($query) {
                $query->where('status', Halaman::STATUS_PUBLISH);
            }
        ])->get();

        return view('halaman.show', compact('halaman', 'bagian'));
    }
}
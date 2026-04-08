<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\KategoriService;
use App\Helpers\ApiResponse;
use App\Models\Kategori;
use App\Http\Requests\Kategori\StoreKategoriRequest;
use App\Http\Requests\Kategori\UpdateKategoriRequest;

class KategoriController extends Controller
{
    public function __construct(
        protected KategoriService $service
    ) {}

    public function index()
    {
        return ApiResponse::success(
            $this->service->getAll()
        );
    }

    public function byBagian($bagianId)
    {
        $data = Kategori::where('bagian_id', $bagianId)->get();
        return ApiResponse::success($data);
    }

    public function show($id)
    {
        return ApiResponse::success(
            $this->service->getById($id)
        );
    }

    public function store(StoreKategoriRequest $request)
    {
        return ApiResponse::success(
            $this->service->store($request->validated()),
            'Created',
            201
        );
    }

    public function update(UpdateKategoriRequest $request, $id)
    {
        return ApiResponse::success(
            $this->service->update($id, $request->validated()),
            'Updated'
        );
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);

            return ApiResponse::success(null, 'Deleted');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 400);
        }
    }
}
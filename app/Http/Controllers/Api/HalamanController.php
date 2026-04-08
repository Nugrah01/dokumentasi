<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HalamanService;
use App\Helpers\ApiResponse;
use App\Http\Requests\Halaman\StoreHalamanRequest;
use App\Http\Requests\Halaman\UpdateHalamanRequest;
use App\Models\Kategori;
use App\Models\Bagian;

class HalamanController extends Controller
{
    public function __construct(
        protected HalamanService $service
    ) {}

    public function index()
    {
        $data = $this->service->getAll();
        return ApiResponse::success($data);
    }

    public function show($id)
    {
        $data = $this->service->getById($id);
        return ApiResponse::success($data);
    }

    public function store(StoreHalamanRequest $request)
    {
        $data = $this->service->store($request->validated());
        return ApiResponse::success($data, 'Created', 201);
    }

    public function update(UpdateHalamanRequest $request, $id)
    {
        $data = $this->service->update($id, $request->validated());
        return ApiResponse::success($data, 'Updated');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return ApiResponse::success(null, 'Deleted');
    }

    
}
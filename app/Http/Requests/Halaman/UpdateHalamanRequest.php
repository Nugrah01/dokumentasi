<?php

namespace App\Http\Requests\Halaman;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHalamanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kategori_id' => ['sometimes','exists:kategori,id'],
            'bagian_id' => ['sometimes','exists:bagian,id'],
            'deskripsi' => ['sometimes','string'],
            'jawaban' => ['sometimes','string'],
            'status' => ['sometimes','in:publish,draft,archived,delete']
        ];
    }
}
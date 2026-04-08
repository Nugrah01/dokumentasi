<?php

namespace App\Http\Requests\Kategori;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bagian_id' => ['sometimes','exists:bagian,id'],
            'judul' => ['sometimes','string','max:255'],
            'konten' => ['nullable','string']
        ];
    }
}
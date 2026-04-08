<?php

namespace App\Http\Requests\Kategori;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bagian_id' => ['required','exists:bagian,id'],
            'judul' => ['required','string','max:255'],
            'konten' => ['nullable','string']
        ];
    }
}
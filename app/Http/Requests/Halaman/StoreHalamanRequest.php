<?php

namespace App\Http\Requests\Halaman;

use Illuminate\Foundation\Http\FormRequest;

class StoreHalamanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kategori_id' => ['required','exists:kategori,id'],
            'deskripsi' => ['required','string'],
            'jawaban' => ['required','string'],
            'status' => ['required','in:publish,draft,archived,delete']
        ];
    }
}
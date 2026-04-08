<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EditorUploadController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'upload' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048']
    ]);

    $file = $request->file('upload');

    $path = $file->store('editor-images', 'public');

    return response()->json([
        'uploaded' => 1,
        'fileName' => $file->getClientOriginalName(),
        'url' => asset('storage/' . $path)
    ]);
}
}
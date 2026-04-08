<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
    ]);

    $file = $request->file('upload');
    // Simpan ke folder editor-images (sesuai route /api/image/{filename})
    $path = $file->store('editor-images', 'public');

    // Extract filename
    $filename = basename($path);

    // Return URL yang sesuai dengan route /api/image/{filename}
    $url = url('api/image/' . $filename);

    return response()->json([
        'url' => $url,
    ]);
}
}
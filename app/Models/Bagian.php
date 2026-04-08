<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bagian extends Model
{
    use HasFactory;

    protected $table = 'bagian';

    protected $fillable = [
        'judul',
        'halaman_id',
        'deskripsi',
        'status'
    ];

    public function halaman()
    {
        return $this->belongsTo(Halaman::class);
    }
    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }
}
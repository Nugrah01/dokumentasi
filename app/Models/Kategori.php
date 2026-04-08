<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'bagian_id',
        'judul',
        'konten'
    ];

    public function halaman()
    {
        return $this->hasMany(Halaman::class);
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }
    public function halamanPublish()
    {
        return $this->hasMany(Halaman::class)
            ->where('status', Halaman::STATUS_PUBLISH);
    }
}
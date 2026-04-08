<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Halaman extends Model
{
    use SoftDeletes;

    const STATUS_PUBLISH = 'publish';
    const STATUS_DRAFT   = 'draft';
    const STATUS_ARCHIVED = 'delete';

    protected $table = 'halaman';

    protected $fillable = [
        'kategori_id',
        'deskripsi',
        'jawaban',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function bagian()
    {
        return $this->hasMany(Bagian::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;

    //mengizinkan memasukkan seluruh data selain id kalau fillable keterbalikannya
    protected $guarded = [
        'id',
    ];
}

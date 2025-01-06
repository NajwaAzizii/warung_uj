<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;

    //mengizinkan memasukkan seluruh data selain id kalau fillable keterbalikannya
    protected $guarded = [
        'id',
    ];
    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class); // Pastikan Produk adalah model yang benar
    }
}

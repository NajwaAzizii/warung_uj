<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * Get the kategori that owns the produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }

    public function keranjangs()
    {
        return $this->hasMany(keranjang::class);
    }

    public function detail_transaksis(): HasMany
    {
        return $this->hasMany(detail_transaksi::class);
    }
}

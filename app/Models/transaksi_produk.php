<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class transaksi_produk extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiProdukFactory> */
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    /**
     * Get the user that owns the transaksi_produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    //untuk tau transaksi ini milik user yang mana
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    //1 transaksi memiliki banyak detail(lebih dari 1 produk)
    public function detail_transaksis(): HasMany
    {
        return $this->hasMany(detail_transaksi::class);
    }
}

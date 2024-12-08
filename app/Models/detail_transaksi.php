<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detail_transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\DetailTransaksiFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    // untuk mengetahui record data transaksi detail ini milik detail yang mana
    public function transaksi_produk(): BelongsTo
    {
        return $this->belongsTo(transaksi_produk::class);
    }


    //untuk mengetahui detail informasi ini produk yang mana
    public function produk(): BelongsTo
    {
        return $this->belongsTo(produk::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Traits\HasRoles;
use App\Models\transaksi_produk;
use App\Models\keranjang;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keranjang[] $keranjangs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaksi_Produk[] $transaksi_produks
 */


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles; //agar spatie dapat mendeteksi apa user ini adalah role yang mana

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //1 user memiliki banya item di entiti keranjang
    public function keranjangs()
    {
        return $this->hasMany(keranjang::class);
    }

    //1 user memiliki 1 atau leih data transaksi
    public function transaksi_produks()
    {
        return $this->hasMany(transaksi_produk::class);
    }
}

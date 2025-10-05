<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keranjang[] $keranjangs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaksi_Produk[] $transaksi_produks
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $keranjangs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read int|null $transaksi_produks_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $produk_id
 * @property int $transaksi_produk_id
 * @property int $harga
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\produk $produk
 * @property-read \App\Models\transaksi_produk $transaksi_produk
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereTransaksiProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|detail_transaksi whereUpdatedAt($value)
 */
	class detail_transaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama
 * @property string $slug
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\produk> $produk
 * @property-read int|null $produk_count
 * @method static \Database\Factories\kategoriFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|kategori whereUpdatedAt($value)
 */
	class kategori extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $produk_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $quantity
 * @property-read \App\Models\produk $produk
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\keranjangFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|keranjang whereUserId($value)
 */
	class keranjang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_produk
 * @property string $slug
 * @property string $foto
 * @property int $harga
 * @property int $kategori_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\detail_transaksi> $detail_transaksis
 * @property-read int|null $detail_transaksis_count
 * @property-read \App\Models\kategori $kategori
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\keranjang> $keranjangs
 * @property-read int|null $keranjangs_count
 * @method static \Database\Factories\produkFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|produk whereUpdatedAt($value)
 */
	class produk extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $harga_total
 * @property int $status_pembayaran
 * @property string $alamat
 * @property string $nomor_hp
 * @property string|null $catatan
 * @property string|null $bukti_pembayaran
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\detail_transaksi> $detail_transaksis
 * @property-read int|null $detail_transaksis_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereBuktiPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereHargaTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereNomorHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|transaksi_produk whereUserId($value)
 */
	class transaksi_produk extends \Eloquent {}
}


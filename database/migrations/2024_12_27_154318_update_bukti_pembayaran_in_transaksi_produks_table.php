<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBuktiPembayaranInTransaksiProduksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi_produks', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable()->change();
            $table->string('catatan')->nullable()->change(); // Mengubah kolom menjadi nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_produks', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable(false)->change(); // Mengembalikan ke tidak nullable
            $table->string('catatan')->nullable(false)->change();
        });
    }
}

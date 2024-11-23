<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harga_total');
            $table->boolean('status_pembayaran');
            $table->string('alamat');
            $table->string('nomor_hp');
            $table->text('catatan');
            $table->string('bukti_pembayaran');
            $table->foreign('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_produks');
    }
};

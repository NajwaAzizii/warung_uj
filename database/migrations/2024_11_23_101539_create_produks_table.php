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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('slug');
            $table->string('foto');
            $table->unsignedBigInteger('harga'); //yaitu angkanya tidak boleh negatif
            $table->foreign('kategori_id')->constrained()->onDelete('cascade'); //tidak perlu references jika nama kolom id nya sama degan nama tabelnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

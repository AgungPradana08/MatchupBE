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
        Schema::create('kompetisi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('olahraga')->nullable();
            $table->string('deskripsi');
            $table->string('juara_pertama');
            $table->string('juara_kedua');
            $table->string('juara_ketiga');
            $table->string('lokasi');
            $table->string('detail_lokasi')->nullable();
            $table->string('max_member');
            $table->string('aksebilitas')->nullable();
            $table->string('tingkatan')->nullable();
            $table->string('tanggal_pertandingan');
            $table->string('harga_tiket');
            $table->string('lama_pertandingan');
            $table->string('waktu_pertandingan');
            $table->string('deskripsi_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetisi');
    }
};

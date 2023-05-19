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
        Schema::create('sparring', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('olahraga')->nullable();
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('min_member');
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
        Schema::dropIfExists('sparring');
    }
};

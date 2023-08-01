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
        Schema::create('usersparring', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('usertim_id');
            $table->string('title');
            $table->string('nama_tim_lawan')->nullable();
            $table->string('nama_tim');
            $table->string('image')->nullable();
            $table->string('olahraga');
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('min_member');
            $table->string('max_member');
            $table->string('tingkatan');
            $table->string('tanggal_pertandingan');
            $table->string('harga_tiket');
            $table->string('lama_pertandingan');
            $table->string('waktu_pertandingan');
            $table->string('deskripsi_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersparring');
    }
};

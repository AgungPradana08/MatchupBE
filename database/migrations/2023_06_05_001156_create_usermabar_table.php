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
        Schema::create('usermabar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('host_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('olahraga');
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('min_member');
            // $table->integer('min_member')->default(1);
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
        Schema::dropIfExists('usermabar');
    }
};

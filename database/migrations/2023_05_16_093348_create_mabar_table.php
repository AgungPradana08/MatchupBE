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
        Schema::create('mabar', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('olahraga');
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('min_member');
            $table->string('max_member');
            $table->string('aksebilitas');
            $table->string('tingkatan');
            $table->string('tanggal_pertandingan');
            $table->string('harga_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mabar');
    }
};

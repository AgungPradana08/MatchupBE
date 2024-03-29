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
        Schema::create('matches_sparring', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersparring_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('usertim_id')->nullable();
            $table->string('nama_tim_lawan')->nullable(); // Tambahkan kolom nama_tim_lawan dengan tipe string dan nullable
            $table->string('image_tim_lawan')->nullable(); // Tambahkan kolom image_tim_lawan dengan tipe string dan nullable
            $table->timestamps();

            // Definisikan foreign key untuk "usersparring_id"
            $table->foreign('usersparring_id')->references('id')->on('usersparring')->onDelete('cascade');

            // Definisikan foreign key untuk "user_id"
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('usertim_id')->references('id')->on('usertim')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches_sparring');
    }
};

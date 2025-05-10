<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_222320', function (Blueprint $table) {
            $table->string('id_room_222320')->primary();
            $table->string('nama_kamar_222320', 100);
            $table->string('gambar_222320', 255)->nullable();
            $table->enum('status_222320', ['available', 'booked'])->default('available');
            $table->string('tipe_id_222320')->nullable();
            $table->foreign('tipe_id_222320')->references('tipe_id_222320')->on('tiperoom_222320')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_222320');
    }
};

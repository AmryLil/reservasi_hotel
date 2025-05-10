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
        Schema::create('tiperoom_222320', function (Blueprint $table) {
            $table->string('tipe_id_222320')->primary();
            $table->string('nama_tipe_222320', 50);
            $table->text('deskripsi_222320')->nullable();
            $table->decimal('harga_222320', 10, 2);
            $table->text('fasilitas_222320')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiperoom_222320');
    }
};

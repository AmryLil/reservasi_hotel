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
        Schema::create('gallery_222320', function (Blueprint $table) {
            $table->id('id_gallery_222320');
            $table->string('judul_222320', 100);
            $table->text('deskripsi_222320')->nullable();
            $table->string('path_gambar_222320', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_222320');
    }
};

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
        Schema::create('review_222320', function (Blueprint $table) {
            $table->string('id_review_222320')->primary();
            $table->string('id_user_222320')->nullable();
            $table->foreign('id_user_222320')->references('user_id_222320')->on('users_222320')->onDelete('set null');
            $table->integer('rating_222320')->nullable();
            $table->text('komentar_222320')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_222320');
    }
};

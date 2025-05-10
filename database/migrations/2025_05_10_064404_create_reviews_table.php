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
            $table->id('id_review_222320');
            $table->foreignId('id_user_222320')->nullable()->constrained('users_222320', 'user_id_222320')->onDelete('set null');
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

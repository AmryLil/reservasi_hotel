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
        Schema::create('users_222320', function (Blueprint $table) {
            $table->string('user_id_222320')->primary();
            $table->string('nama_222320', 100);
            $table->string('email_222320', 100)->unique();
            $table->string('phone_222320', 15)->nullable();
            $table->text('alamat_222320')->nullable();
            $table->enum('gender_222320', ['L', 'P'])->nullable();
            $table->string('password_222320', 255);
            $table->enum('role_222320', ['admin', 'user'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_222320');
    }
};

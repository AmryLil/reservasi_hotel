<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vouchers_222320', function (Blueprint $table) {
            $table->string('id_voucher_222320')->primary();
            $table->string('kode_voucher_222320')->unique();
            $table->string('id_user_222320');
            $table->foreign('id_user_222320')->references('email_222320')->on('users_222320')->onDelete('cascade');
            $table->enum('tipe_222320', ['loyalitas', 'pengguna_baru'])->default('loyalitas');
            $table->decimal('persentase_diskon_222320', 5, 2);
            $table->date('tanggal_kadaluarsa_222320');
            $table->enum('status_222320', ['tersedia', 'terpakai'])->default('tersedia');
            $table->string('id_booking_terpakai_222320')->nullable();
            $table->foreign('id_booking_terpakai_222320')->references('id_booking_222320')->on('booking_222320')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vouchers_222320');
    }
};

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
        Schema::create('booking_222320', function (Blueprint $table) {
            $table->string('id_booking_222320')->primary();
            $table->string('email_222320');
            $table->string('id_room_222320');
            $table->date('tanggal_checkin_222320');
            $table->date('tanggal_checkout_222320');
            $table->integer('jumlah_tamu_222320');
            $table->decimal('total_harga_222320', 10, 2);
            $table->string('status_222320')->default('pending');  // contoh default
            $table->text('catatan_222320')->nullable();
            $table->text('catatan_admin_222320')->nullable();
            $table->date('tanggal_booking_222320');
            $table->date('tanggal_pembatalan_222320')->nullable();
            $table->time('waktu_checkin_222320')->nullable();
            $table->time('waktu_checkout_222320')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_222320');
    }
};

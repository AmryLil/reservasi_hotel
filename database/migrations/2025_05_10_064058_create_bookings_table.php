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
            $table->string('id_user_222320')->nullable();
            $table->foreign('id_user_222320')->references('user_id_222320')->on('users_222320')->onDelete('set null');

            $table->string('id_room_222320')->nullable();
            $table->foreign('id_room_222320')->references('id_room_222320')->on('room_222320')->onDelete('set null');
            $table->date('checkin_date_222320');
            $table->date('checkout_date_222320');
            $table->integer('jumlah_orang_222320');
            $table->decimal('total_harga_222320', 10, 2);
            $table->enum('status_booking_222320', ['pending', 'confirmed', 'checked_in', 'completed'])->default('pending');
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

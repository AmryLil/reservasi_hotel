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
            $table->id('id_booking_222320');
            $table->foreignId('id_user_222320')->nullable()->constrained('users_222320', 'user_id_222320')->onDelete('set null');
            $table->foreignId('id_room_222320')->nullable()->constrained('room_222320', 'id_room_222320')->onDelete('set null');
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

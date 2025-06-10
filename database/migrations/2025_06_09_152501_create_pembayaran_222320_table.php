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
        Schema::create('pembayaran_222320', function (Blueprint $table) {
            $table->string('id_pembayaran_222320')->primary();
            $table->string('id_booking_222320');
            $table->decimal('jumlah_bayar_222320', 10, 2);
            $table->enum('metode_pembayaran_222320', ['cash', 'bank', 'qris']);
            $table->enum('status_pembayaran_222320', ['pending', 'success', 'failed'])->default('pending');
            $table->datetime('tanggal_pembayaran_222320');
            $table->string('bukti_pembayaran_222320')->nullable();
            $table->text('keterangan_222320')->nullable();

            // Foreign key constraint
            $table
                ->foreign('id_booking_222320')
                ->references('id_booking_222320')
                ->on('booking_222320')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_222320');
    }
};

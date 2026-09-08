<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();      // ID transaksi dari Midtrans, misal MTKBY-1787...
            $table->string('nama');
            $table->string('email');
            $table->integer('gross_amount');            // Total pembayaran (dalam rupiah)
            $table->string('status')->default('pending'); // pending / success / failed / expired
            $table->string('payment_type')->nullable();  // VA, GoPay, dll (diisi nanti dari webhook)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
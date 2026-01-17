<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            
            // PENTING: Tambahkan user_id sesuai rencana "Restrukturisasi Tahap 1" Anda
            // Gunakan nullable() dulu jika takut error saat seeding, tapi idealnya constrained()
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->text('customer_address');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
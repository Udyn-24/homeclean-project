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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // --- Integrated Columns ---
            $table->string('invoice_code')->unique(); // Example: INV-2023001
            
            // Relationships
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Customer
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // The Service selected
            $table->foreignId('cleaner_id')->nullable()->constrained('users')->onDelete('set null'); // The Cleaner (nullable because assigned later)
            $table->foreignId('address_id')->constrained('addresses'); // Location of cleaning
            
            // Details
            $table->date('booking_date');
            $table->time('booking_time');
            $table->decimal('total_price', 12, 2);
            $table->enum('status', ['pending', 'paid', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            // --------------------------

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
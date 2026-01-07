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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // --- Integrated Columns ---
            $table->string('name'); 
            $table->text('description');
            $table->decimal('price_per_hour', 10, 2); // Example: 150000.00
            $table->integer('duration_hours'); // Estimated time in hours
            $table->string('image')->nullable(); // For the file upload feature
            // --------------------------

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
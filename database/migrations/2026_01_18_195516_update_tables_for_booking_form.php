<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pastikan kita sudah menggunakan database yang benar
        // Update addresses table
        if (Schema::hasTable('addresses')) {
            Schema::table('addresses', function (Blueprint $table) {
                if (!Schema::hasColumn('addresses', 'address_line')) {
                    $table->string('address_line')->nullable();
                }
                if (!Schema::hasColumn('addresses', 'city')) {
                    $table->string('city')->nullable();
                }
                if (!Schema::hasColumn('addresses', 'province')) {
                    $table->string('province')->nullable();
                }
                if (!Schema::hasColumn('addresses', 'postal_code')) {
                    $table->string('postal_code')->nullable();
                }
                if (!Schema::hasColumn('addresses', 'phone')) {
                    $table->string('phone')->nullable();
                }
            });
        }

        // Update bookings table untuk guest data
        if (Schema::hasTable('bookings')) {
            Schema::table('bookings', function (Blueprint $table) {
                if (!Schema::hasColumn('bookings', 'customer_name')) {
                    $table->string('customer_name')->nullable()->after('user_id');
                }
                if (!Schema::hasColumn('bookings', 'customer_email')) {
                    $table->string('customer_email')->nullable()->after('customer_name');
                }
                if (!Schema::hasColumn('bookings', 'customer_phone')) {
                    $table->string('customer_phone')->nullable()->after('customer_email');
                }
                if (!Schema::hasColumn('bookings', 'customer_address')) {
                    $table->text('customer_address')->nullable()->after('customer_phone');
                }
            });
        }
    }

    public function down()
    {
        // Optional: rollback logic
        if (Schema::hasTable('bookings')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn(['customer_name', 'customer_email', 'customer_phone', 'customer_address']);
            });
        }
        
        if (Schema::hasTable('addresses')) {
            Schema::table('addresses', function (Blueprint $table) {
                $table->dropColumn(['address_line', 'city', 'province', 'postal_code', 'phone']);
            });
        }
    }
};
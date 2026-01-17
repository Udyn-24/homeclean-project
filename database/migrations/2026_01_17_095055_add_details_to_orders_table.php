<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // KITA HAPUS user_id DAN status DARI SINI (KARENA SUDAH ADA DI TABEL UTAMA)
            
            // Kita hanya menambahkan worker_id
            // (Ini aman dilakukan di sini karena tabel 'workers' sudah dibuat sebelumnya)
            $table->foreignId('worker_id')
                  ->nullable()
                  ->after('user_id')
                  ->constrained('workers')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['worker_id']);
            $table->dropColumn('worker_id');
        });
    }
};
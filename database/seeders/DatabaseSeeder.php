<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT USER (Admin, Customer, Cleaner)
        // Menggunakan updateOrCreate agar tidak error jika dijalankan 2x
        User::updateOrCreate(
            ['email' => 'admin@homeclean.com'],
            [
                'name' => 'Admin Ganteng',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone_number' => '081234567890',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@homeclean.com'],
            [
                'name' => 'Budi Customer',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'phone_number' => '089876543210',
            ]
        );

        // 2. BUAT KATEGORI LAYANAN
        $catGeneral = ServiceCategory::create([
            'name' => 'General Cleaning',
            'slug' => 'general-cleaning'
        ]);

        $catDeep = ServiceCategory::create([
            'name' => 'Deep Cleaning',
            'slug' => 'deep-cleaning'
        ]);

        // 3. BUAT DAFTAR LAYANAN (SERVICES)
        Service::create([
            'category_id' => $catGeneral->id,
            'name' => 'Basic House Cleaning',
            'description' => 'Pembersihan standar menyapu, mengepel, dan merapikan kamar.',
            'price_per_hour' => 50000,
            'duration_hours' => 2,
            'image' => null, 
        ]);

        Service::create([
            'category_id' => $catDeep->id,
            'name' => 'Kamar Mandi Kinclong',
            'description' => 'Pembersihan kerak membandel di kamar mandi.',
            'price_per_hour' => 75000,
            'duration_hours' => 3,
            'image' => null,
        ]);

        // 4. BUAT PEKERJA (WORKERS)
        Worker::create([
            'name' => 'Siti Bersih',
            'phone' => '087711223344',
            'rating' => 4.8,
            'photo' => null
        ]);

        Worker::create([
            'name' => 'Joko Rajin',
            'phone' => '087755667788',
            'rating' => 4.5,
            'photo' => null
        ]);
        
        echo "\nData berhasil diisi! \n";
        echo "Login Admin: admin@homeclean.com / password \n";
        echo "Login User: user@homeclean.com / password \n";
    }
}
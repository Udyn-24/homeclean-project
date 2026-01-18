<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Worker;
use App\Models\Order; // GANTI Booking dengan Order
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT USER (Admin, Customer, Cleaner)
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

        User::updateOrCreate(
            ['email' => 'cleaner@homeclean.com'],
            [
                'name' => 'Siti Cleaner',
                'password' => Hash::make('password'),
                'role' => 'cleaner',
                'phone_number' => '081333444555',
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

        // 3. BUAT DAFTAR LAYANAN (SERVICES) - 9 LAYANAN DARI SQL
        $services = [
            [
                'category_id' => $catGeneral->id,
                'name' => 'Basic Cleaning',
                'description' => 'Pembersihan standar harian: menyapu, mengepel, dan merapikan tempat tidur.',
                'price_per_hour' => 50000.00,
                'duration_hours' => 2,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Deep Cleaning',
                'description' => 'Pembersihan menyeluruh hingga ke sudut sulit, cocok untuk rumah yang lama tidak dibersihkan.',
                'price_per_hour' => 100000.00,
                'duration_hours' => 4,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'VIP Cleaning (Sultan)',
                'description' => 'Layanan premium dengan 2 petugas, peralatan lengkap, dan pewangi ruangan aromaterapi.',
                'price_per_hour' => 250000.00,
                'duration_hours' => 3,
                'image' => null,
            ],
            [
                'category_id' => $catGeneral->id,
                'name' => 'Ironing Service',
                'description' => 'Jasa setrika baju kiloan maupun satuan, dijamin rapi dan wangi.',
                'price_per_hour' => 40000.00,
                'duration_hours' => 1,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Bathroom Deep Clean',
                'description' => 'Membersihkan kerak kamar mandi, kloset, dan wastafel hingga kinclong kembali.',
                'price_per_hour' => 75000.00,
                'duration_hours' => 2,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Kitchen Cleaning',
                'description' => 'Membersihkan area dapur yang berminyak, kompor, dan cuci piring menumpuk.',
                'price_per_hour' => 85000.00,
                'duration_hours' => 2,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Sofa & Carpet Wash',
                'description' => 'Cuci basah/kering untuk sofa dan karpet guna menghilangkan debu dan tungau.',
                'price_per_hour' => 150000.00,
                'duration_hours' => 3,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Move-in / Move-out',
                'description' => 'Pembersihan total rumah kosong sebelum ditempati atau setelah pindahan.',
                'price_per_hour' => 200000.00,
                'duration_hours' => 5,
                'image' => null,
            ],
            [
                'category_id' => $catDeep->id,
                'name' => 'Post-Renovation',
                'description' => 'Membersihkan sisa cat, semen, dan debu tebal pasca renovasi rumah.',
                'price_per_hour' => 180000.00,
                'duration_hours' => 6,
                'image' => null,
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

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
        
        // 5. BUAT ORDER (PESANAN) - GANTI Booking dengan Order
        for ($i = 0; $i < 15; $i++) {
            Order::create([
                'customer_name' => 'Customer ' . ($i + 1),
                'customer_email' => 'customer' . ($i + 1) . '@email.com',
                'customer_phone' => '0812' . rand(100000, 999999),
                'customer_address' => 'Jl. Contoh No. ' . ($i + 1) . ', Jakarta',
                'service_id' => rand(1, 9),
                'user_id' => 2, // customer
                'worker_id' => rand(1, 2), // worker
                'status' => ['pending', 'confirmed', 'completed'][rand(0, 2)],
            ]);
        }
        
        echo "\n✅ Data berhasil diisi! \n";
        echo "🔑 Login Admin: admin@homeclean.com / password \n";
        echo "👤 Login User: user@homeclean.com / password \n";
        echo "🧹 Login Cleaner: cleaner@homeclean.com / password \n";
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Akun Admin & User (Tetap dipertahankan)
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@homeclean.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Budi Customer',
            'email' => 'customer@homeclean.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // 2. Data Layanan (9 Item untuk Grid 3x3)
        $services = [
            [
                'name' => 'Basic Cleaning',
                'description' => 'Pembersihan standar harian: menyapu, mengepel, dan merapikan tempat tidur.',
                'price_per_hour' => 50000,
                'duration_hours' => 2
            ],
            [
                'name' => 'Deep Cleaning',
                'description' => 'Pembersihan menyeluruh hingga ke sudut sulit, cocok untuk rumah yang lama tidak dibersihkan.',
                'price_per_hour' => 100000,
                'duration_hours' => 4
            ],
            [
                'name' => 'VIP Cleaning (Sultan)',
                'description' => 'Layanan premium dengan 2 petugas, peralatan lengkap, dan pewangi ruangan aromaterapi.',
                'price_per_hour' => 250000,
                'duration_hours' => 3
            ],
            [
                'name' => 'Ironing Service',
                'description' => 'Jasa setrika baju kiloan maupun satuan, dijamin rapi dan wangi.',
                'price_per_hour' => 40000,
                'duration_hours' => 1
            ],
            [
                'name' => 'Bathroom Deep Clean',
                'description' => 'Membersihkan kerak kamar mandi, kloset, dan wastafel hingga kinclong kembali.',
                'price_per_hour' => 75000,
                'duration_hours' => 2
            ],
            [
                'name' => 'Kitchen Cleaning',
                'description' => 'Membersihkan area dapur yang berminyak, kompor, dan cuci piring menumpuk.',
                'price_per_hour' => 85000,
                'duration_hours' => 2
            ],
            [
                'name' => 'Sofa & Carpet Wash',
                'description' => 'Cuci basah/kering untuk sofa dan karpet guna menghilangkan debu dan tungau.',
                'price_per_hour' => 150000,
                'duration_hours' => 3
            ],
            [
                'name' => 'Move-in / Move-out',
                'description' => 'Pembersihan total rumah kosong sebelum ditempati atau setelah pindahan.',
                'price_per_hour' => 200000,
                'duration_hours' => 5
            ],
            [
                'name' => 'Post-Renovation',
                'description' => 'Membersihkan sisa cat, semen, dan debu tebal pasca renovasi rumah.',
                'price_per_hour' => 180000,
                'duration_hours' => 6
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
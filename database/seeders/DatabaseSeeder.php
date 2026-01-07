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
        // 1. Akun Admin (Password: password)
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@homeclean.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Akun Customer
        User::create([
            'name' => 'Budi Customer',
            'email' => 'customer@homeclean.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // 3. Layanan Dasar
        Service::create([
            'name' => 'Deep Clean',
            'description' => 'Bersih total',
            'price_per_hour' => 100000,
            'duration_hours' => 4
        ]);
    }
}
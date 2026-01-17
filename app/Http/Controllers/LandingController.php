<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // PENTING: Panggil model Service

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua data layanan dari database
        $services = Service::all();

        // Kirim data ($services) ke tampilan 'welcome'
        return view('welcome', compact('services'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 layanan populer (contoh: berdasarkan harga tertinggi atau bisa diubah)
        $popularServices = Service::orderBy('price_per_hour', 'desc')->limit(3)->get();
        
        return view('home', compact('popularServices'));
    }
}
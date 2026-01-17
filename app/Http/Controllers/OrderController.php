<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. TAMPILKAN FORM ORDER (Guest)
    public function create($service_id)
    {
        $service = Service::findOrFail($service_id);
        return view('order.create', compact('service'));
    }

    // 2. SIMPAN ORDER
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
        ]);

        Order::create($request->all());

        return redirect()->route('landing')->with('success', 'Pesanan berhasil! Tim kami akan segera menghubungi Anda via WhatsApp.');
    }
}
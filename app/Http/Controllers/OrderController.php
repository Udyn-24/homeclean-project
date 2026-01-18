<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Service $service)
    {
        return view('order.create', compact('service'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        // 1. Hitung total harga
        $service = Service::find($validated['service_id']);
        $duration = $service->duration_hours; // Ambil dari service
        $totalPrice = $service->price_per_hour * $duration;

        // 2. Buat alamat baru (simpan di tabel addresses)
        $address = Address::create([
            'address_line' => $validated['customer_address'],
            // Default values untuk field lain
            'city' => 'Jakarta',
            'province' => 'DKI Jakarta',
            'postal_code' => '12345',
            'phone' => $validated['customer_phone']
        ]);

        // 3. Buat booking
        $booking = Order::create([
            'invoice_code' => Order::generateInvoiceCode(),
            'user_id' => auth()->check() ? auth()->id() : null,
            'service_id' => $validated['service_id'],
            'address_id' => $address->id,
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'total_price' => $totalPrice,
            'status' => 'pending',
            'notes' => $validated['notes'],
            // Simpan juga data customer untuk guest
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
        ]);

        return redirect()->route('home')
                         ->with('success', 'Booking berhasil! Kode Invoice: ' . $booking->invoice_code);
    }
}
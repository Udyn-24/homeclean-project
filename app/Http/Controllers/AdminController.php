<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalServices' => Service::count(),
            'totalOrders' => Order::count(),
            'totalUsers' => User::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_price'),
        ];

        $recentOrders = Order::with('service', 'user')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }

    // Service Management
    public function services()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_hour' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $validated['image'] = $imagePath;
        }

        Service::create($validated);

        return redirect()->route('admin.services')
                         ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function editService(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_hour' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
                unlink(storage_path('app/public/' . $service->image));
            }
            
            $imagePath = $request->file('image')->store('services', 'public');
            $validated['image'] = $imagePath;
        }

        $service->update($validated);

        return redirect()->route('admin.services')
                         ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroyService(Service $service)
    {
        // Hapus gambar jika ada
        if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
            unlink(storage_path('app/public/' . $service->image));
        }

        $service->delete();

        return redirect()->route('admin.services')
                         ->with('success', 'Layanan berhasil dihapus.');
    }

    // Order Management
    public function orders()
    {
        $orders = Order::with('service', 'user')
            ->latest()
            ->paginate(20);
        
        return view('admin.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status order berhasil diperbarui.');
    }
}
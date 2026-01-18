<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Worker;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    
    public function index()
    {
        // Data Statistik
        $stats = [
            'totalOrders' => Order::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
            'totalRevenue' => Order::where('status', 'completed')->sum('total_price') ?: 0,
            'totalCustomers' => User::where('role', 'customer')->count(),
            'totalCleaners' => Worker::count(),
            'totalServices' => Service::count(),
        ];

        // Data untuk Chart
        $ordersByMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $ordersByMonth[$i] = Order::whereMonth('created_at', $i)
                ->whereYear('created_at', date('Y'))
                ->count();
        }

        // Recent Orders
        $recentOrders = Order::with(['service', 'user', 'worker'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'ordersByMonth', 'recentOrders'));
    }
}
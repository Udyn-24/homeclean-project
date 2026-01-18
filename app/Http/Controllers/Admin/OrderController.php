<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Worker;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    
    public function index()
    {
        $orders = Order::with(['service', 'worker', 'user'])
            ->latest()
            ->get();
        
        $workers = Worker::all();
        
        return view('admin.orders.index', compact('orders', 'workers'));
    }
    
    public function show(Order $order)
    {
        $order->load(['service', 'worker', 'user']);
        $workers = Worker::all();
        
        return view('admin.orders.show', compact('order', 'workers'));
    }
    
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);
        
        $order->update(['status' => $request->status]);
        
        return back()->with('success', 'Order status updated successfully.');
    }
    
    public function assignWorker(Request $request, Order $order)
    {
        $request->validate([
            'worker_id' => 'required|exists:workers,id',
        ]);
        
        $order->update([
            'worker_id' => $request->worker_id,
            'status' => 'confirmed'
        ]);
        
        return back()->with('success', 'Worker assigned successfully.');
    }
    
    public function destroy(Order $order)
    {
        $order->delete();
        
        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
    
    // Export PDF
    public function exportPdf(Order $order)
    {
        $order->load(['service', 'worker', 'user']);
        
        // Install dulu: composer require barryvdh/laravel-dompdf
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.invoice', compact('order'));
        
        return $pdf->download('invoice-' . $order->id . '.pdf');
    }
}
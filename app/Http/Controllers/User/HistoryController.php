<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }
    
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['service', 'worker'])
            ->latest()
            ->get();
        
        return view('user.history', compact('orders'));
    }
    
    public function show(Order $order)
    {
        // Authorization
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        $order->load(['service', 'worker']);
        
        return view('user.order-detail', compact('order'));
    }
    
    public function review(Request $request, Order $order)
    {
        // Authorization
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);
        
        // Update order review
        $order->update([
            'rating' => $request->rating,
            'review' => $request->comment,
        ]);
        
        return back()->with('success', 'Thank you for your review!');
    }
}
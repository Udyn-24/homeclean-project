<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    
    public function index()
    {
        $workers = Worker::withCount('orders')->get();
        return view('admin.workers.index', compact('workers'));
    }
    
    public function create()
    {
        return view('admin.workers.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'rating' => 'nullable|numeric|min:0|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->only(['name', 'phone', 'rating']);
        
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('workers', 'public');
        }
        
        Worker::create($data);
        
        return redirect()->route('admin.workers.index')
            ->with('success', 'Worker created successfully.');
    }
    
    public function show(Worker $worker)
    {
        $worker->load('orders.service');
        return view('admin.workers.show', compact('worker'));
    }
    
    public function edit(Worker $worker)
    {
        return view('admin.workers.edit', compact('worker'));
    }
    
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'rating' => 'nullable|numeric|min:0|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->only(['name', 'phone', 'rating']);
        
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($worker->photo) {
                Storage::disk('public')->delete($worker->photo);
            }
            $data['photo'] = $request->file('photo')->store('workers', 'public');
        }
        
        $worker->update($data);
        
        return redirect()->route('admin.workers.index')
            ->with('success', 'Worker updated successfully.');
    }
    
    public function destroy(Worker $worker)
    {
        // Hapus foto jika ada
        if ($worker->photo) {
            Storage::disk('public')->delete($worker->photo);
        }
        
        $worker->delete();
        
        return redirect()->route('admin.workers.index')
            ->with('success', 'Worker deleted successfully.');
    }
}
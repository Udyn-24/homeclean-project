<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }
    
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'role' => 'required|in:customer,cleaner',
        ]);
        
        $user->update($request->only(['name', 'email', 'phone_number', 'role']));
        
        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }
    
    public function destroy(User $user)
    {
        // Jangan hapus admin
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin user.');
        }
        
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }
}
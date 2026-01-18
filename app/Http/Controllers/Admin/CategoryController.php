<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    
    public function index()
    {
        $categories = ServiceCategory::withCount('services')->get();
        return view('admin.categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name',
        ]);
        
        ServiceCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }
    
    public function edit(ServiceCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    
    public function update(Request $request, ServiceCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $category->id,
        ]);
        
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }
    
    public function destroy(ServiceCategory $category)
    {
        if ($category->services()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category with associated services.');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
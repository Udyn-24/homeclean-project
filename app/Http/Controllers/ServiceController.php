<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // CATATAN: Constructor dihapus untuk memperbaiki error di Laravel 11.
    // Keamanan (Auth) sekarang diatur lewat routes/web.php.

    // 1. READ (Tampilkan Daftar)
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // 2. CREATE (Tampilkan Form Tambah)
    public function create()
    {
        return view('admin.services.create');
    }

    // 3. STORE (Simpan Data Baru ke Database)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_per_hour' => 'required|numeric',
            'duration_hours' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|file|max:2048' // Validasi gambar
        ]);

        $data = $request->all();

        // Cek jika ada upload gambar
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('service-images', 'public');
        }

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // 4. EDIT (Tampilkan Form Edit)
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    // 5. UPDATE (Simpan Perubahan)
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'price_per_hour' => 'required|numeric',
            'duration_hours' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        // Cek jika gambar diganti
        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($service->image) {
                Storage::delete($service->image);
            }
            $data['image'] = $request->file('image')->store('service-images', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diupdate!');
    }

    // 6. DELETE (Hapus Data)
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete($service->image);
        }
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
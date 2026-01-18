<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // tambahkan ini

class Service extends Model
{
    use HasFactory; // tambahkan ini
    
    protected $fillable = [
        'name', 
        'description', 
        'price_per_hour', 
        'duration_hours', 
        'image',
        'category_id' // tambahkan jika ada
    ];

    // Relasi: Layanan milik satu Kategori
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
    
    // Relasi: Layanan punya banyak Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
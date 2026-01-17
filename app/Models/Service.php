<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id', 
        'name', 
        'description', 
        'price_per_hour', 
        'duration_hours', 
        'image'
    ];

    // Relasi: Layanan milik satu Kategori
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
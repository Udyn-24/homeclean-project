<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'name', 
        'photo', 
        'phone', 
        'rating'
    ];

    // Relasi ke Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line',
        'city',
        'province',
        'postal_code',
        'phone'
    ];

    public function bookings()
    {
        return $this->hasMany(Order::class);
    }
}
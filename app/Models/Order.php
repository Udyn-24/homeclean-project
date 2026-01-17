<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'status'
    ];

    // Relasi ke Service (agar kita tahu dia pesan layanan apa)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
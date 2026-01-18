<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tentukan tabel yang benar
    protected $table = 'bookings';

    protected $fillable = [
        'invoice_code',
        'user_id',
        'service_id',
        'cleaner_id',
        'address_id',
        'booking_date',
        'booking_time',
        'total_price',
        'status',
        'notes',
        // Tambahkan untuk guest booking
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relasi ke User (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke User (cleaner)
    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id');
    }

    // Relasi ke Address
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    // Generate invoice code
    public static function generateInvoiceCode()
    {
        $date = date('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        return "HC-{$date}-{$random}";
    }
}
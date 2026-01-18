namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'invoice_code', 'user_id', 'service_id', 'cleaner_id',
        'address_id', 'booking_date', 'booking_time', 'total_price',
        'status', 'notes'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id');
    }
    
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
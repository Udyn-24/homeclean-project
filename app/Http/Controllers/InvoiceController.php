namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generate($id)
    {
        $booking = Booking::with(['user', 'service'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.invoice', compact('booking'));
        
        return $pdf->download('invoice-' . $booking->invoice_code . '.pdf');
    }
}
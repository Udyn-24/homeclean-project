public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'confirmed';
    $booking->save();
    
    // Kirim notifikasi ke customer
    
    return back()->with('success', 'Pesanan telah dikonfirmasi');
}

public function assignCleaner(Request $request, $id)
{
    $booking = Booking::findOrFail($id);
    $booking->cleaner_id = $request->cleaner_id;
    $booking->save();
    
    return back()->with('success', 'Cleaner telah ditugaskan');
}
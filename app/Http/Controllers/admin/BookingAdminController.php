<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        $unreadCount = Booking::where('is_read', false)->count();
        
        return view('admin.booking.index', compact('bookings', 'unreadCount'));
    }

    public function show(Booking $booking)
    {
        if (!$booking->is_read) {
            $booking->update(['is_read' => true]);
        }
        
        return view('admin.booking.show', compact('booking'));
    }

    public function destroy(booking $booking)
    {
        $booking->delete();
        
        return redirect()
            ->route('admin.booking.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}
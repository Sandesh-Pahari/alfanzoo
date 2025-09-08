<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show form
    public function create($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.booking.create', compact('room'));
    }

    // Store booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
            'no_of_people' => 'required|integer|min:1',
            // room_id is required because the bookings table has a non-null FK constraint
            'room_id'    => 'required|exists:rooms,id',
            // allow check-in for today as well
            'check_in'   => 'required|date|after_or_equal:today',
            'check_out'  => 'required|date|after:check_in',
            'special_request' => 'nullable|string|max:1000',
            'pickup'     => 'required|in:yes,no',
            'pickup_details' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::create($validated);

        // If the request expects JSON (API/AJAX), return JSON. Otherwise redirect back with a flash message.
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Booking successfully created!',
                'booking' => $booking,
            ], 201);
        }

        return redirect()->back()->with('success', 'Booking successfully created!');
    }
}

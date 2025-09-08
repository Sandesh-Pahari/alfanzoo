<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    // Show booking form
    public function create($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.booking.create', compact('room'));
    }

    // Store booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'no_of_people'    => 'required|integer|min:1',
            'room_id'         => 'required|exists:rooms,id',
            'check_in'        => 'required|date|after_or_equal:today',
            'check_out'       => 'required|date|after:check_in',
            'special_request' => 'nullable|string|max:1000',
            'pickup'          => 'required|in:yes,no',
            'pickup_details'  => 'nullable|string|max:1000',
        ]);

        // Create booking record
        $booking = Booking::create($validated);

        // ✅ Fetch the room
        $room = Room::findOrFail($validated['room_id']);

        // ✅ Send confirmation email
        Mail::to($validated['email'])
            ->cc('sandeshpahari05@gmail.com')
            ->send(new BookingMail($room, $booking));

        // Handle AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Booking successfully created!',
                'booking' => $booking,
            ], 201);
        }

        // Normal redirect with flash message
        return redirect()
            ->route('rooms.show', $booking->room_id)
            ->with('success', 'Booking successfully created!');
    }
}

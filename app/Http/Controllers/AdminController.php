<?php

namespace App\Http\Controllers;

use App\Models\Contact;
 use App\Models\Booking;
 use App\Models\Room; // Add this line

class AdminController extends Controller
{
    public function dashboard()
    {
        $unreadContactCount = Contact::where('is_read', false)->count();
        $unreadBookingCount = Booking::where('is_read', false)->count();
        $roomCount = Room::count(); // Add this line
        
        return view('admin.dashboard', [
            'unreadContactCount' => $unreadContactCount,
            'unreadBookingCount' => $unreadBookingCount,
            'roomCount' => $roomCount
        ]);
    }
}
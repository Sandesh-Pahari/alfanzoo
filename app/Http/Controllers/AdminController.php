<?php

namespace App\Http\Controllers;

use App\Models\Contact;
 use App\Models\Booking;
 use App\Models\Room; // Add this line
 use App\Models\Table;

class AdminController extends Controller
{
    public function dashboard()
    {
        $unreadContactCount = Contact::where('is_read', false)->count();
        $unreadBookingCount = Booking::where('is_read', false)->count();
        $unreadTableCount = Table::where('is_read', false)->count();

        $roomCount = Room::count(); // Add this line
        
        return view('admin.dashboard', [
            'unreadContactCount' => $unreadContactCount,
            'unreadBookingCount' => $unreadBookingCount,
            'unreadTableCount'   => $unreadTableCount,
            'roomCount' => $roomCount
        ]);
    }
}
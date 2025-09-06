<?php

namespace App\Http\Controllers;

use App\Models\Contact;
// use App\Models\Enrollment;
// use App\Models\Course; // Add this line

class AdminController extends Controller
{
    public function dashboard()
    {
        $unreadContactCount = Contact::where('is_read', false)->count();
        // $unreadEnrollmentCount = Enrollment::where('is_read', false)->count();
        // $courseCount = Course::count(); // Add this line
        
        return view('admin.dashboard', [
            'unreadContactCount' => $unreadContactCount,
            // 'unreadEnrollmentCount' => $unreadEnrollmentCount,
            // 'courseCount' => $courseCount
        ]);
    }
}
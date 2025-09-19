<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Notice;
use App\Models\Faq;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        $photos = Gallery::limit(10)->get();
        $rooms = Room::all();
        $notice = Notice::latest()->first();
        $faqs = Faq::limit(10)->get();
        $teamMembers = TeamMember::all();

        return view('frontend.landing.landing', compact('about', 'photos', 'rooms', 'notice','faqs','teamMembers'));
    }
}

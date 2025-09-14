<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
                $about = About::first();
                $photos = Gallery::limit(10)->get();
                $rooms = Room::all();


                
                

        return view('frontend.landing.landing', compact('about', 'photos','rooms'));
        
    }
}

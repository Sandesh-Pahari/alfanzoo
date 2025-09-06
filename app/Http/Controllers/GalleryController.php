<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery items.
     */
    public function index(Request $request) 
    {
        
        // Get sorting parameters from request
        $sortBy = $request->get('sort', 'created_at'); // Default to created_at
        $sortOrder = $request->get('order', 'desc'); // Default to newest first
        
        // Validate sort parameters
        $allowedSortFields = ['created_at', 'updated_at', 'title', 'date'];
        $allowedSortOrders = ['asc', 'desc'];
        
        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'created_at';
        }
        
        if (!in_array($sortOrder, $allowedSortOrders)) {
            $sortOrder = 'desc';
        }
        
        // Fetch photos with sorting
        $photos = Gallery::orderBy($sortBy, $sortOrder)->get();
        
        return view('frontend.gallery.index', compact('photos', 'sortBy', 'sortOrder'));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        return view('frontend.gallery.create');
    }

    /**
     * Store a newly created gallery item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:jpg,jpeg,png,gif,bmp,webp,avif,svg,tiff,tif,ico,heic|max:2048'
 // 20MB
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads/gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-') . '-' . time(),
            'views' => 0,
            'date' => now(),
            'file_path' => $path,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Photo added successfully!');
    }

    /**
     * Remove the specified gallery item from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete the file from storage
        Storage::disk('public')->delete($gallery->file_path);

        // Delete the database record
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Photo deleted successfully!');
    }
}
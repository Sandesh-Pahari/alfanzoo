<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuImage;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menuImages = MenuImage::all()->map(function ($img) {
            return [
                'id' => $img->id,
                'url' => asset('storage/' . $img->path),
            ];
        });
        return view('frontend.menu.index', compact('menuImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('menu', 'public');

        MenuImage::create(['path' => $path]);

        return back()->with('success', 'Image uploaded successfully!');
    }

    public function destroy(MenuImage $menu)
    {
        Storage::disk('public')->delete($menu->path);
        $menu->delete();

        return back()->with('success', 'Image deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // only one record
                $teamMembers = TeamMember::orderBy('order')->get();
        // return view('frontend.about.index', compact('teamMembers'));
        return view('frontend.about.index', compact('about','teamMembers'));
    }

    public function create()
    {
        if (About::exists()) {
            return redirect()->route('about.edit', About::first()->id)
                             ->with('info', 'About Us already exists. You can only edit it.');
        }
        return view('frontend.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        About::create($validated);

        return redirect()->route('about.index')->with('success', 'About Us created successfully.');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('frontend.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($validated);

        return redirect()->route('about.index')->with('success', 'About Us updated successfully.');
    }
}


<?php
namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // Show latest notice (for popup)
    // public function index()
    // {
    //     $notice = Notice::latest()->first();
    //     return view('frontend.landing.landing', compact('notice'));
    // }

    // Show all notices (for admin dashboard)
    public function list()
    {
        $notices = Notice::latest()->paginate(10);
        return view('admin.notices.list', compact('notices'));
    }

    // Show create form
    public function create()
    {
        return view('admin.notices.create');
    }

    // Store new notice
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('notices', 'public');
        }

        Notice::create($data);

        return redirect()->route('notices.list')->with('success', 'Notice created successfully.');
    }

    // Show edit form
    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    // Update notice
    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('notices', 'public');
        }

        $notice->update($data);

        return redirect()->route('notices.list')->with('success', 'Notice updated successfully.');
    }

    // Delete notice
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.list')->with('success', 'Notice deleted successfully.');
    }
}

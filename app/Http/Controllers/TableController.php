<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Mail\TableMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TableController extends Controller
{
    // Show booking form
    public function create()
    {
        return view('frontend.booking.table');
    }

    // Handle booking submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'guests'          => 'required|integer|min:1',
            'date'            => 'required|date|after_or_equal:today',
            'time'            => 'required',
            // checkbox will submit value "1" when checked
            'pickup'          => 'nullable|in:1',
            'pickup_location' => 'required_if:pickup,1|nullable|string|max:1000',
            'requests'        => 'nullable|string',
        ]);

        // Normalize pickup to boolean (DB uses boolean)
        $validatedData['pickup'] = $request->has('pickup') ? true : false;

        // If pickup is false, ensure pickup_location is null
        if (! $validatedData['pickup']) {
            $validatedData['pickup_location'] = null;
        }

        try {
            // Store reservation in DB
            $table = Table::create($validatedData);

            // Send email with table model (wrap in try/catch if you expect mail failures separately)
            Mail::to('sandeshpahari05@gmail.com')->send(new TableMail($table));

            return redirect()->back()->with('success', 'Your table has been booked successfully!');
        } catch (\Exception $e) {
            Log::error('Table booking error: ' . $e->getMessage());

            // preserve input so user doesn't lose typed values
            return redirect()->back()->withInput()->with('error', 'Failed to book table. Please try again later.');
        }
    }
}

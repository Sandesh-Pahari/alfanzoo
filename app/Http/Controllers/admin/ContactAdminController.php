<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    //
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        // Retrieve contacts in descending order, paginated
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);

        // Count unread messages
        $unreadCount = Contact::where('is_read', false)->count();

        // Return the admin view with the contacts data and unread count
        return view('admin.contacts.index', compact('contacts', 'unreadCount'));
    }

    /**
     * Display the specified contact.
     */
    public function show(Contact $contact)
    {
        // Mark as read if it is not already
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}

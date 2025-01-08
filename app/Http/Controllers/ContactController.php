<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest; // Add this line
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        // Use validated data to create a new contact
        Contact::create($request->validated());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for contacting us! We will respond shortly.');
    }
    public function index()
    {
        // Ensure only admin users can access this view (if middleware isn't enough)
        // This is optional since middleware already restricts access
        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized access');
        // }

         // Retrieve all contact form data
        // $contacts = Contact::all();
        $contacts = Contact::paginate(10); // Use paginate() instead of get()

        // Pass the data to the view
        return view('admin.contacts.index', compact('contacts'));
    }
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        
        if ($contact) {
            $contact->delete();
            return redirect('/admin/contacts')->with('success', 'Message deleted successfully.');
        } else {
            return redirect('/admin/contacts')->withErrors('Message not found');
        }
    }

    
}

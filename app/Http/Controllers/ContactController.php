<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('contact_success', true);
    }

    public function showAll()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact-details', compact('contacts'));
    }
}

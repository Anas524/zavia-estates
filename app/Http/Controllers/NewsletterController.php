<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function home()
    {
        return view('zavia');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Subscribed successfully!']);
    }

    public function index()
    {
        $subscribers = Newsletter::latest()->get();
        return view('admin.newsletters', compact('subscribers'));
    }
}

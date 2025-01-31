<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:15',
            'message'    => 'required|string',
        ]);

        Query::create($request->all());

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}


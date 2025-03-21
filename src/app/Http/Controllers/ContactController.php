<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        return view('index', ['oldData' => $request->all()]);
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:5,15',
            'address' => 'required',
            'category' => 'required',
            'message' => 'required|max:120',
        ]);

        return view('confirm', ['data' => $validated]);
    }

    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}

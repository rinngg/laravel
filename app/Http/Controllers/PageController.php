<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Show the login form
    public function login()
    {
        return view('login'); // Return the login view
    }

    // Handle login requests
    public function loginPost(Request $request)
    {
        // Validate the login form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the homepage
            return redirect()->route('home');
        }

        // Redirect back with an error if authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(); // Preserve input values
    }

    // Handle logout requests
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        // Redirect to the homepage
        return redirect()->route('home');
    }

    // Handle contact form submissions
    public function contactSubmit(Request $request)
    {
        // Validate the contact form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Process the form submission (e.g., send an email, store in database)
        // For example, you could use Mail::to('example@example.com')->send(new ContactFormMail($request->all()));

        // Redirect back with a success message
        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
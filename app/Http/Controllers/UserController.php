<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Show the form for creating a new user
    public function create()
    {
        return view('userscreate'); // Updated to userscreate.blade.php
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|string|max:3',
            'phone' => [
                'required',
                'string',
                'regex:/^(\+61|0)4[0-9]{8}$/', // Australian phone number validation
            ],
            'address' => 'required|string|max:255',
            'professional_summary' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the new user
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'professional_summary' => $request->professional_summary,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the create user page with a success message
        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }

    // Show the form for editing a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user')); // Ensure you have an edit.blade.php view
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|string|max:3',
            'phone' => [
                'required',
                'string',
                'regex:/^(\+61|0)4[0-9]{8}$/', // Australian phone number validation
            ],
            'address' => 'required|string|max:255',
            'professional_summary' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'professional_summary' => $request->professional_summary,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('home')->with('success', 'User updated successfully');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success', 'User deleted successfully');
    }

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
            // Redirect to the intended page or homepage if successful
            return redirect()->intended(route('home'));
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
        
        // Redirect to the login page
        return redirect()->route('login');
    }

    // Example of a method to register a new user (optional)
    public function register(Request $request)
    {
        // Validate the registration form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the intended page or homepage
        return redirect()->intended(route('home'));
    }
}
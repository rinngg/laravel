<?php

// app/Http/Controllers/Auth/VerificationController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show()
    {
        return auth()->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('auth.verify');
    }
}
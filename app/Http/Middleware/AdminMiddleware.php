<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Your logic to check if the user is an admin
        if (!Auth::check() || !Auth::user()->isAdmin) {
            return redirect('/');
        }

        return $next($request);
    }
}

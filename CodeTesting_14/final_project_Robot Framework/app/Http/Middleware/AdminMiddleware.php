<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has admin role
        if ($request->user() && $request->user()->role == 'admin') {
            return $next($request);
        }

        // If the user is not admin, redirect them or show an error message
        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
}

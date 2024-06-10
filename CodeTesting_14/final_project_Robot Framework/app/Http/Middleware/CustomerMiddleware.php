<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has customer role
        if ($request->user() && $request->user()->role == 'pelanggan') {
            return $next($request);
        }

        // If the user is not a customer, redirect them or show an error message
        return redirect()->route('login')->with('error', 'Login Terlebih Dahulu Untuk Mengakses Halaman Ini');
    }
}

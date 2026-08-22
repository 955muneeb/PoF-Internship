<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if the user is authenticated
        // 2. Check if the authenticated user's role is 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Let them pass
        }

        // Otherwise, throw a 403 unauthorized error
        abort(403, 'Unauthorized Access. Admins only.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and utype = 1 (admin)
        if (Auth::check() && Auth::user()->utype == 1) {
            return $next($request);
        }

        // If not admin, redirect or abort
        abort(403, 'Unauthorized'); 
        // OR
        // return redirect('/dashboard')->with('error', 'You are not authorized to access admin area.');
    }
}

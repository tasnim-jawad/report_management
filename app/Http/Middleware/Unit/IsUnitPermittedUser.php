<?php

namespace App\Http\Middleware\Unit;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUnitPermittedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the required permission
        // dd(Auth::user()->is_permitted);
        if (Auth::check() && Auth::user()->is_permitted === 1) {
            return $next($request);
        }

        // Log out the user and redirect to the login page
        Auth::logout();
        return redirect('/login')->with('error', 'You are not permitted to access dashboard.');
    }
}

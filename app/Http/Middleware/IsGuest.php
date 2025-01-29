<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::check());
        if (Auth::check()) {
            // dd($request->headers->all());
            // $token = session('token') ?? request()->bearerToken();
            // if(!$token){
            //     auth()->logout();
            //     return $next($request);
            // }
            // auth()->logout();
            $user = Auth::user();
            $prevurl = session('prevurl', '#/dashboard'); // Default to '#/dashboard' if prevurl is not set
            // dd($user);
            switch ($user->role) {
                case 6:
                    // return redirect('/dashboard/unit' . $prevurl);
                case 5:
                    // return redirect('/dashboard/ward' . $prevurl);
                case 4:
                    // return redirect('/dashboard/thana' . $prevurl);
                case 2:
                    // return redirect('/dashboard/admin' . $prevurl);
                default:
                    // If role doesn't match any case, proceed with the request
                    return $next($request);
            }
        }

        if (!Auth::check()) {
            return $next($request);
        }
    }
}

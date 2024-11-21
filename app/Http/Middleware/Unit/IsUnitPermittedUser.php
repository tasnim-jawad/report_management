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
        if (Auth::check() && auth()->user()->roll == 6 ) {
            
            if(auth()->user()->org_unit_responsible[0]->responsibility_id == 1 ){
                // dd(auth()->user());
                return $next($request);
            }else{
                return redirect()->back();
            }
        }else{
            auth()->logout();
            return redirect('/logout');
        }
    }
}

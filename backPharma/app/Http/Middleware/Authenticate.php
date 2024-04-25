<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate 
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');    
        
    }
}

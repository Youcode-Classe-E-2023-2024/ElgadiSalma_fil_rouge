<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = explode("|", $role);
        
        foreach ($roles as $rolea) {
            if ($request->user()->role->name === $rolea) {
                return $next($request);
            }
        }
    
        return redirect()->back()->with('error', 'Unauthorized');
    }
    
}

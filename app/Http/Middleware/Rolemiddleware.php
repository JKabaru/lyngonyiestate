<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Rolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        
        // if ($user->role->roleName === 'admin') {
        // dd($request->user());
        // $request->user()->roles->contains('name', $role)
        if (!$request->user()->role === $role)
        {
            return redirect('dashboard');
        }
        return $next($request);
    }
}



<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Check if the user has the required role
        if ($user->role !== $role) {
            // Redirect to an appropriate page if the user does not have the required role
            return redirect('unauthorized');
        }
      
        return $next($request);
        
    }
}

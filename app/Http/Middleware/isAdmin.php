<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'isAdmin' ability
        if (Gate::allows('isAdmin')) 
        {
            return $next($request);
        }

        // // If not, you can redirect or abort with a 403 Forbidden response
        return response()->json(['message' => 'Forbidden'], 403); 
        {
            return $next($request);
     }

         return redirect('/noaccess'); // Redirect to a no access page or any other action
    }
}

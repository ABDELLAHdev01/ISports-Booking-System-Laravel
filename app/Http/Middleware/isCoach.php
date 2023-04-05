<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isCoach
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
        // chech if user role is coach
        if (auth()->user()->role == 'coach') {
            return $next($request);
        }
        else {
            // then redirect his dashboard based on his actual role
            if (auth()->user()->role == 'user') {
                return redirect('dashboard')->with('error', 'You have not coach access');
            }
            else if (auth()->user()->role == 'admin') {
                return redirect('admin');
            }
        }
    }
}

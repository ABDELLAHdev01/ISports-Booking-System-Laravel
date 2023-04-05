<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
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
        // check if user role is user
        if (auth()->user()->role == 'user') {
            return $next($request);
        }
        else {
            // then redirect his dashboard based on his actual role
            if (auth()->user()->role == 'admin') {
                return redirect('admin')->with('error', 'You have not user access');
            }
            else if (auth()->user()->role == 'coach') {
                return redirect('coach');
            }
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isQuizDone
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
        // check if auth user has done the quiz
        if (auth()->user()->quizstatus == '1') {
            return $next($request);
        }
        else {
            // then redirect him to the quiz page
            return redirect('quiz');
        }

    }
}

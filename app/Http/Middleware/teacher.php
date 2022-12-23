<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user()->user == 'student') {
        //     return redirect('student');
        // }
        // if (auth()->user()->user == 'Teacher'){
        //     return redirect('teachers');
        // }
        return $next($request);
    }
}

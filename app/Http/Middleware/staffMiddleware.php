<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class staffMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('welcome')->withErrors('password', 'Please login');
        }
        if (Auth::user()->role =='staff') {
                return $next($request);
        }
        if (Auth::user()->role == 'student') {

              return redirect()->route('studentDashboard');
        }
    }
}

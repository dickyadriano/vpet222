<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Veterinary
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
        if (auth()->user()->type == 'veterinary'){
            return $next($request);
        }
        return redirect('dashboard')->with('error', "Sorry, only Veterinary can access this menu!");
    }
}

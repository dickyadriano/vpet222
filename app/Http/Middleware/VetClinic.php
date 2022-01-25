<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VetClinic
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
        if (auth()->user()->type == 'vetClinic'){
            return $next($request);
        }
        return redirect('dashboard')->with('error', "Sorry, only Vet Clinic can access this menu!");
    }
}

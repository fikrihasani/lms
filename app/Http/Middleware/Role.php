<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role == 'admin' && $request->user()->role == 1) {
            # code...
            return $next($request);
        }
        if ($role == 'guru' && $request->user()->role == 0) {
            # code...
            return $next($request);
        }
        return redirect('/');
    }
}

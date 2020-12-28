<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->roles == '["ROLE_CODEX"]') {
                return redirect()->route('dashboard_codex');
            }
            
            if(Auth::user()->roles == '["ROLE_ADMIN"]') {
                return redirect()->route('dashboard_admin');
            }
            
            if(Auth::user()->roles == '["ROLE_COOPEC"]') {
                return redirect()->route('dashboard_coopec');
            }
            
            if(Auth::user()->roles == '["ROLE_ADMIN_READ_ONLY"]') {
                return redirect()->route('dashboard_admin_read_only');
            }
        }

        return $next($request);
    }
}

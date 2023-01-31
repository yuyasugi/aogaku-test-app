<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'users';
    private const GUARD_ADMIN = 'admins';

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard(self::GUARD_ADMIN)->check() && $request->routeIs('admin.*')) {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            }
        if (Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')) {
                return redirect(RouteServiceProvider::HOME);
            };
        return $next($request);
    }
}

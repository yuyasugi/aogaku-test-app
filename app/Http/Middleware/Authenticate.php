<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
             if (Route::is(config('route.admin_wild'))) {
               return route(config('route.admin_login_route'));
            }
             return route(config('route.user_login_route'));
        }
    }
}

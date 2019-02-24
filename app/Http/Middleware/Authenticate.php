<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $uri = $_SERVER["REQUEST_URI"];
            $guard = substr($uri, 1, 5);
            if ($guard == "admin") {
              return route('admin.login');
            }
            return route('login');
        }
    }
}

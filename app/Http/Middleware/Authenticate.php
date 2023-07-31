<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        $uri = $request->getRequestUri();

        if (Str::startsWith($uri, '/admin')) {
            return $request->expectsJson() ? null : route('admin.auth.login');
        } else {

            return $request->expectsJson() ? null : route('auth.login');
        }
    }
}

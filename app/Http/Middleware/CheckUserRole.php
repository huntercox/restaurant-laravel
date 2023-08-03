<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->hasRole('admin')) {
            // Redirect the user to the home page
            return redirect('/');
            // Alternatively, you can abort with a 403 status code
            // return abort(403, 'You do not have access to this page.');
        }

        return $next($request);
    }
}

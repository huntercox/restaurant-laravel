<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ShareCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      Inertia::share([
        'cart' => function () use ($request) {
          if ($user = $request->user()) {
            return $user->cart()->get();
          }

          // Handle guest user here, maybe by using Session as you did before
          $guestUserId = Session::get('guest_user_id');

          if ($guestUserId) {
            // If there's a guest user ID in the session, retrieve it
            $user = User::find($guestUserId);
            return $user ? $user->cart()->get() : [];
          }

          return [];
        },
      ]);

      return $next($request);
    }
}

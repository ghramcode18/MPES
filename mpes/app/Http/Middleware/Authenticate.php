<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // public function handle($request, Closure $next)
    // {
    //     if ($this->auth->guest())
    //     {
    //         if ($request->ajax())
    //         {
    //             return response('Unauthorized.', 401);
    //         }
    //         else
    //         {
    //             return redirect()->guest('auth/login');
    //         }
    //     }

    //     return $next($request);
    // }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

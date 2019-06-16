<?php

namespace App\Middleware;

use Bow\Auth\Auth;
use Bow\Http\Request;

class Guest
{
    /**
     * Launch function of the middleware.
     *
     * @param  Request $request
     * @param  callable $next
     * @return mixed
     */
    public function process(Request $request, callable $next)
    {
        if (Auth::guest()) {
            return $next($request);
        }

        return redirect($this->redirectTo());
    }

    /**
     * Get redirect url
     *
     * @return string
     */
    public function redirectTo()
    {
        return '/';
    }
}

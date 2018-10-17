<?php

namespace App\Middleware;

use Bow\Auth\Auth;
use Bow\Http\Request;

class Guest
{
    /**
     * Fonction de lancement du middleware.
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

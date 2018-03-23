<?php

namespace App\Middleware;

use Bow\Auth\Auth;

class Guest
{
    /**
     * Fonction de lancement du middleware.
     *
     * @param  \Bow\Http\Request $request
     * @param  callable          $next
     * @return boolean
     */
    public function checker($request, callable $next)
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

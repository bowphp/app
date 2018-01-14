<?php
namespace App\Middleware;

use Bow\Auth\Auth;

class Guest
{
    /**
     * Fonction de lancement du middleware.
     *
     * @param \Bow\Http\Request $request
     * @param callable $next
     * @return boolean
     */
    public function checker($request, callable $next, $guard)
    {
        if (Auth::guest()) {
            return $next();
        }

        return redirect('/');
    }
}

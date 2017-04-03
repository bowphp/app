<?php
namespace App\Middleware;

use Bow\Http\Request;

class VerifyToken
{
    /**
     * Fonction de lancement du middleware.
     *
     * @param Request $request
     * @param \Closure $next
     * @return boolean
     */
    public function handle(Request $request, \Closure $next)
    {
        if (! (request()->isPost() || request()->isPut())) {
            return $next();
        }

        if (request()->isAjax()) {
            if (request()->getHeader('X-CSRF-TOKEN') === session('_token')) {
                return $next();
            }

            return response('unauthorize.', 401);
        }

        if (input('_token', null) !== session('_token')) {
            return false;
        }

        return $next();
    }
}
<?php
namespace App\Firewall;

class VerifyToken
{
    /**
     * Fonction de lancement du middleware.
     *
     * @param \Bow\Http\Request $request
     * @param \Closure $next
     * @return boolean
     */
    public function checker($request, \Closure $next)
    {
        if (! ($request->isPost() || $request->isPut())) {
            return $next();
        }

        if ($request->isAjax()) {
            if ($request->getHeader('X-CSRF-TOKEN') === session('_token')) {
                return $next();
            }

            return response('unauthorize.', 401);
        }

        if (input('_token', null) !== session('_token')) {
            return response('Token Mismatch');
        }

        return $next();
    }
}
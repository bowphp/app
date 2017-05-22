<?php
namespace App\Firewall;

class TestFirewall
{
    /**
     * Fonction de lancement du firewall.
     *
     * @param \Bow\Http\Request $request
     * @param \Closure $next
     * @return boolean
     */
    public function checker($request, \Closure $next)
    {
        return $next();
    }
}
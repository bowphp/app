<?php
namespace App\Middleware;

use Bow\Middleware\AuthMiddleware;

class Authenticate extends AuthMiddleware
{
    /**
     * Url de redirection si l'utilisateur n'est pas connecté.
     *
     * @return string
     */
    public function redirectTo()
    {
        return '/login';
    }
}

<?php
namespace App\Middleware;

use Bow\Middleware\AuthMiddleware;

class Authenticate extends AuthMiddleware
{
    /**
     * Redirect URL if the user is not logged in.
     *
     * @return string
     */
    public function redirectTo()
    {
        return '/login';
    }
}

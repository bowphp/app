<?php

namespace App\Middlewares;

use Bow\Middleware\AuthMiddleware;

class AuthenticateMiddleware extends AuthMiddleware
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

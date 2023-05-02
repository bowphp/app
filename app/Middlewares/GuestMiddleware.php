<?php

namespace App\Middlewares;

use Bow\Auth\Auth;
use Bow\Http\Request;
use Bow\Middleware\BaseMiddleware;

class GuestMiddleware implements BaseMiddleware
{
    /**
     * Launch function of the middleware.
     *
     * @param  Request $request
     * @param  callable $next
     * @param  array $args
     * @return mixed
     */
    public function process(Request $request, callable $next, array $args = []): mixed
    {
        if (Auth::getInstance()->guest()) {
            return $next($request);
        }

        return redirect($this->redirectTo());
    }

    /**
     * Get redirect url
     *
     * @return string
     */
    public function redirectTo(): string
    {
        return '/';
    }
}

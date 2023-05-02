<?php

namespace App\Middlewares;

use Bow\Middleware\CsrfMiddleware;

class RequestCsrfMiddleware extends CsrfMiddleware
{
    /**
     * {@inheritdoc}
     */
    public function preventOn(): array
    {
        return [
            // Add the route pattern for escape the X-CSRF checker
        ];
    }
}

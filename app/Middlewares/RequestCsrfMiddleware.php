<?php

namespace App\Middlewares;

use Bow\Middleware\CsrfMiddleware;

class RequestCsrfMiddleware extends CsrfMiddleware
{
    /**
     * {@inheritdoc}
     */
    public function preventOn()
    {
        return [
        ];
    }
}

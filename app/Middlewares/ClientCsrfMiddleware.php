<?php

namespace App\Middlewares;

use Bow\Http\Request;
use Bow\Middleware\CsrfMiddleware;

class ClientCsrfMiddleware extends CsrfMiddleware
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

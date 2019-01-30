<?php

namespace App\Middleware;

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

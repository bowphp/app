<?php
namespace App\Middleware;

class VerifyToken
{
    /**
     * Handler
     *
     * @return bool
     */
    public function handle()
    {
        if (!(request()->isPost() || request()->isPut())) {
            return false;
        }

        if (!body()->has("_token")) {
            return false;
        }

        if (body()->has('_token') !== session('_token')) {
            return false;
        }

        return true;
    }
}
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
        if (request()->isPost() || request()->isPut()) {

            if (body()->has("csrf_token")) {
                return true;
            }

            return false;
        }

        return true;
    }
}
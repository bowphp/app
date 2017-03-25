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
            return true;
        }

        if (request()->isAjax()) {
            if (request()->getHeader('X-CSRF-TOKEN') == session('_token')) {
                return true;
            }

            return response('unauthorize.', 401);
        }

        if (!body()->has("_token")) {
            return false;
        }

        if (body()->get('_token') !== session('_token')) {
            return false;
        }

        return true;
    }
}
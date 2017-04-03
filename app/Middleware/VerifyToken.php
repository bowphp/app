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
        if (! (request()->isPost() || request()->isPut())) {
            return true;
        }

        if (request()->isAjax()) {
            if (request()->getHeader('X-CSRF-TOKEN') === session('_token')) {
                return true;
            }

            return response('unauthorize.', 401);
        }

        if (input('_token', null) !== session('_token')) {
            return false;
        }

        return true;
    }
}
<?php
namespace App\Middleware;

class Test
{
    /**
     * Handler
     *
     * @return bool
     */
    public function handle()
    {
        response("Text Middleware.", 200);
        return true;
    }
}
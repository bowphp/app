<?php

namespace App\Controllers;

use Bow\Http\Request;

class WelcomeController
{
    /**
     * Show index
     *
     * @param  Request $request
     * @return string|null
     */
    public function __invoke(Request $request): ?string
    {
        return view('welcome');
    }
}

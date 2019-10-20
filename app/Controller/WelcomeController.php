<?php

namespace App\Controller;

use App\Controller\Controller;
use Bow\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show index
     *
     * @param Request $request
     * @param string $name
     * @return string
     */
    public function __invoke(Request $request, string $name)
    {
        return sprintf('Hello, <b>%s</b>', $name);
    }
}

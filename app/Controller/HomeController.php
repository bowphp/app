<?php

namespace App\Controller;

use App\Controller\Controller;
use Bow\Http\Request;

class HomeController extends Controller
{
    /**
     * Show index
     *
     * @param Request $request
     * @param string $name
     * @return string
     */
    public function index(Request $request, $name)
    {
        return sprintf('<b>%s</b>', $name);
    }
}

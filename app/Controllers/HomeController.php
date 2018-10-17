<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Bow\Http\Request;

class HomeController extends Controller
{
    /**
     * Show index
     *
     * @param Request $request
     */
    public function index(Request $request, $name)
    {
        return sprintf('<b>%s</b>', $name);
    }
}

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
     * @return string
     */
    public function __invoke(Request $request)
    {
        return response()->render('welcome');
    }
}

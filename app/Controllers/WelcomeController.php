<?php

namespace App\Controllers;

use App\Controllers\Controller;
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
        return $this->render('welcome');
    }
}

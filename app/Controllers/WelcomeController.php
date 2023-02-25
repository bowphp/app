<?php

namespace App\Controllers;

use Bow\Http\Request;
use App\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Show index
     *
     * @param Request $request
     * @return string
     */
    public function __invoke(Request $request): ?string
    {
        return $this->render('welcome');
    }
}

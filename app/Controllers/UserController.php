<?php
namespace App\Controllers;

class UserController extends Controller
{
    /**
     * Show welcom message
     *
     * @return mixed
     */
    public function welcome()
    {
        return view('wellcome');
    }
}
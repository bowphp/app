<?php
namespace App\Controllers;

class UserController extends Controller
{
    public function welcome()
    {
        return view('wellcome');
    }
}
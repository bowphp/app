<?php
namespace App\Controllers;

class UsersController extends Controller
{
    public function welcome()
    {
        return view('wellcome');
    }
}
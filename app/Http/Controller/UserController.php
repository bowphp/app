<?php

namespace App\Http\Controller;

use App\Provider\BaseController as Controller;

class UserController extends Controller
{
    public static function index($req, $res)
    {
		response("welcome");
    }
}

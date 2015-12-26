<?php

namespace App\Http\Controller;


use App\Provider\BaseController as Controller;
use System\Http\Request;


class UserController extends Controller
{

    /**
     * Index
     *
     * @param Request $req
     */
    public static function index(Request $req)
    {
		response("welcome");
    }


}

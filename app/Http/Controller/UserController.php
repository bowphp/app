<?php


namespace App\Http\Controller;


use Snoop\Database\DB;
use Snoop\Http\Request;
use App\Provider\BaseController as Controller;


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

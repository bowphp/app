<?php

namespace App\Http\Controller;

use System\Database\DB;
use App\Provider\BaseController as Controller;

class UserController extends Controller
{
    public static function index($req, $res)
    {
        DB::connection();
    	$res->render("contributors", [
    		"liste" => DB::select("select * from users"),
			"info" => "<info@diagnostic.com>", 
			"licence" => "Licence MIT@" . date("Y"), 
			"name" => "The Snoop Framework"
		]);
    }
}

<?php

namespace App\Http\Controller;

use App\Provider\BaseController as Controller;
use System\Http\Request;
use System\Http\Response;
use System\Support\Session;

class UserController extends Controller
{
    public static function index($req, $res)
    {
		response("welcome");
    }

    public static function addUser($req)
    {
		response("addusers", ["success" => Session::get("success")], 200);
        Session::stop();
    }

    public static function create(Request $req, Response $res)
    {
        if ($req->referer() !== null) {
            $data = $req->body()->get();
            $r = insert("insert into users set name = :name, lastname = :lastname, email = :email", $data);
            if ($r == 1) {
                Session::add("success", true);
                store($req::files()->get("file"), $data["name"]);
                $res->redirect("/users/add");
            }
        }
    }

    public static function get($req)
    {
		echo "Hello world";
    }
}

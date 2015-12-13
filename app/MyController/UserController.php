<?php

namesapce App\MyController;

use System\ViewsRender as View;
use System\Database as DB;
use App\Provider\BaseController.php as Controller;

class UserController extends Controller
{
    public function index($id)
    {
        $users = DB::table("users")->get((int) $id);
        return View::show("users.index", $users);
    }
}

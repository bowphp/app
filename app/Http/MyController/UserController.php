<?php

namesapce App\Http\MyController;

use System\ViewsRender as View;
use System\Database as DB;
use App\Provider\BaseController.php as Controller;

class UserController extends Controller
{
    public function index($id)
    {
        $users = DB::table("users")->get((int) $id);
        return Views::show("users@index.php", $users);
    }
}

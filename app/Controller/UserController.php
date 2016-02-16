<?php

namespace App\Controller;

use Exception;
use App\Controller;
use App\Model\Users;
use Bow\Http\Request;
use Bow\Database\Database;

class UserController extends Controller
{
	/**
	 * Start point
	 *
	 * @param Request $req
	 * @return mixed
	 */
   	public function index(Request $req)
   	{
		// do something here
		return json(["message" => "hello world"]);
   	}

	/**
	 * Add information
	 *
	 * @param Request $req
	 * @param Response $res
	 */
   	public function add(Request $req)
   	{
		// do something here
	}

	/**
	 * get all information
	 *
	 * @param Request $req
	 * @return mixed
	 */
 	public function get(Request $req)
   	{
		// do something here.
	}
	
	/**
	 * Delete data
	 *
	 * @param Request $req
	 * @return mixed
	 */
   	public function delete(Request $req)
	{
		// do something here
 	}
}
<?php

namespace App\Controller;

use App\Controller;
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
	 * @return mixed
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
	 * Update data
	 *
	 * @param Request $req
	 * @return mixed
	 */
   	public function update(Request $req)
	{
		// do something here
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
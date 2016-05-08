<?php

namespace App\Controller;

use App\Controller;
use Vap\Database\Database;

class UserController extends Controller
{
	/**
	 * Start point
	 *
	 * @return mixed
	 */
   	public function index()
   	{
		// do something here
		return json(["message" => "hello world"]);
   	}

	/**
	 * Add information
	 *
	 * @return mixed
	 */
   	public function add()
   	{
		// do something here
	}

	/**
	 * get all information
	 *
	 * @return mixed
	 */
 	public function get()
   	{
		// do something here.
	}
	
	/**
	 * Update data
	 *
	 * @return mixed
	 */
   	public function update()
	{
		// do something here
 	}

	/**
	 * Delete data
	 *
	 * @return mixed
	 */
	public function delete()
	{
		// do something here
	}
}
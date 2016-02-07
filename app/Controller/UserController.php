<?php

namespace App\Controller;


use Exception;
use App\Controller;
use Bow\Http\Request;
use Bow\Database\Database as Db;


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
		return response("Hello world");
   	}

	/**
	 * Delete data
	 *
	 * @param Request $req
	 * @return mixed
	 */
   	public function delete(Request $req)
	{
		echo "User is deleted.";
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
		// eg. insert("insert into your_table values(1, 'name')");	
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
		// e.g table("your_table")->get()// retourne une liste
	}

}
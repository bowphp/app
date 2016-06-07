<?php
namespace App\Controller;

use App\Controller;
use Bow\Database\Database;

class UserController extends Controller
{
	/**
	 * Créer une nouvelle instance du controller
	 */
	public function __construct()
	{
		$this->middleware("test");
	}

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
	 * @param mixed $id [optional]
	 * @return mixed
	 */
 	public function get($id = null)
   	{
		// do something here.
	}
	
	/**
	 * Update data
	 * @param mixed $id
	 * @return mixed
	 */
   	public function update($id)
	{
		// do something here
 	}

	/**
	 * Delete data
	 * @param mixed $id
	 * @return mixed
	 */
	public function delete($id)
	{
		// do something here
	}
}
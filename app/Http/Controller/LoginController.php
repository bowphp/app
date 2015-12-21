<?php

namespace App\Http\Controller;


use Exception;
use System\Database\DB;
use System\Http\Request;
use System\Http\Response;
use System\Support\Logger as Log;
use App\Provider\BaseController as Controller;


class LoginController extends Controller
{
	/**
	 * Start point
	 *
	 * @param Request $req
	 * @param Response $res
	 * @return mixed
	 */
    public function index(Request $req, Response $res)
    {
        DB::connection(function($err) {
        	if ($err instanceof Exception) {
        		Log::error($err->getMessage());
        		die();
        	}
        });
        // do something here
    	$res->send("Hello world");
    }

	/**
	 * Delete data
	 *
	 * @param Request $req
	 * @param Response $res
	 * @return mixed
	 */
    public function delete($req, $res)
    {
        
    	// do something here

    }

	/**
	 * Add information
	 *
	 * @param Request $req
	 * @param Response $res
	 */
    public function add($req, $res)
    {
       
       // do something here
       // eg. DB::insert("insert into your_table values(1, 'name')");
    	
    }
	/**
	 * get all information
	 *
	 * @param Request $req
	 * @param Response $res
	 * @return mixed
	 */
    public function get(Request $req, Response $res, $id)
    {
    	// do something here.
    }
}
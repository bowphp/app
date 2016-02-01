<?php

namespace App\Middleware;


use Bow\Http\Request;


class Auth
{
	/**
	 * Handler
	 *
	 * @param Request $req
	 * @return bool
	 */
	public function handler(Request $req)
	{

		response("Hello world, i'm a middleware.");

		return true;
	}
}
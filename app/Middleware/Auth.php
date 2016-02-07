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
		response("<h1>Hello world, i'm a middleware.</h1>");
		return true;
	}
}
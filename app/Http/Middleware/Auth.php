<?php

namespace App\Http\Middleware;


use Closure;
use System\Http\Request;


class Auth
{
	/**
	 * Handler
	 *
	 * @param Request $req
	 * @param Closure $next
	 * @return bool
	 */
	public function handler(Request $req, Closure $next)
	{

		send("Hello world i'm a middleware.");

		return true;
	}
}
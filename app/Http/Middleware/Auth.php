<?php

namespace App\Http\Middleware;

class Auth
{

	public function handler($req, $res, array $closure = null)
	{
		echo "Hello world i'm a middleware.";
		return true;
	}
}
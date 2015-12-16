<?php

namespace App\Http\Middleware;

class Auth
{

	public function handler()
	{
		echo "Hello world i'm a middleware.";
		return true;
	}
}
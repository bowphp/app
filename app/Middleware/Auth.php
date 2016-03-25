<?php

namespace App\Middleware;

class Auth
{
	/**
	 * Handler
	 *
	 * @return bool
	 */
	public function handler()
	{
		response("Auth Middleware.");
		return true;
	}
}
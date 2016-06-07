<?php
namespace App\Middleware;

class Auth
{
	/**
	 * Handler
	 *
	 * @return bool
	 */
	public function handle()
	{
		response("Auth Middleware.");
		return true;
	}
}
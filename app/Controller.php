<?php

namespace App;

class Controller
{
	/**
	 * @var string
	 */
	protected $middlewareBaseNamespace = "App\\Middleware";

	/**
	 * Lanceur de middleware
	 * 
	 * @param string $name Le nom de middelware.
	 * @return mixed
	 */
	public function middleware($name)
	{
		$middleware = $this->middlewareBaseNamespace . "\\" . $name;

		if (class_exists($middleware)) {
			$class = new $middleware();
			return call_user_func_array([$class, "hanlder"], array_slice(func_get_args(), 1));
		}

		return false;
	}
}

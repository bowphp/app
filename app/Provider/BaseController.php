<?php

namespace App\Provider;

class BaseController
{
	/**
	 * 
	 * @var string
	 */
	protected $middleware_namespace = "App\Http\Middleware\\"; 

	/**
	 * Lanceur de middleware
	 * 
	 * @param string $name
	 * @param mixed
	 * @return mixed
	 */
	public function middleware($name, $data)
	{
		$middleware = $this->middleware_namespace . $name;
		if (class_exists($middleware)) {
			$class = new $middleware();
			return call_user_func_array([$class, "hanlder"], $data);
		}
	}

}

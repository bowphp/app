<?php

namespace App;

class Controller
{
	/**
	 * Exemple
	 *
	 * @var array
	 */
	public $paginate = [
		'Articles' => [
			'conditions' => ['published' => 1]
		]
	];

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

	/**
	 * Permet de faire des redirections sur un autre page ou sur l'action du meme controlleur
	 * ou d'un autre controlleur et actioner une methode.
	 *
	 * @param mixed $mixed
	 * @return null
	 */
	public function redirect($mixed)
	{
		return null;
	}
}

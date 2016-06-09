<?php
namespace App;

use Bow\Support\Str;

class Controller
{
	/**
	 * Exemple
	 *
	 * @var array
	 */
	public $paginate = [
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
		$middleware = $this->middlewareBaseNamespace . "\\" . ucfirst($name);
		$next = false;

		if (class_exists($middleware)) {
			$class = new $middleware();
			$next =  call_user_func_array([$class, "handle"], array_slice(func_get_args(), 1));
		}

		if (!$next) {
			die();
		}
	}

	/**
	 * Permet de faire des rédirections sur un autre page ou sur l'action du meme controlleur
	 * ou d'un autre controlleur et actioner une methode.
	 *
	 * @param mixed $url
	 * @param array $parameters
	 * @return null
	 */
	public function redirect($url, array $parameters = [])
	{
		response()->redirect(url($url, $parameters));
	}
}

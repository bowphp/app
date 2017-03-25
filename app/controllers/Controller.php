<?php
namespace App\Controllers;

class Controller
{
	/**
	 * Exemple
	 *
	 * @var array
	 */
	protected $paginate = [
	];

	/**
	 * @var string
	 */
	protected $middlewareBaseNamespace = "App\\middleware";

	/**
	 * Lanceur de middleware
	 *
	 * @param string $name Le nom de middelware.
	 * @return mixed
	 *
	 * @throws \ErrorException
	 */
	public function middleware($name)
	{
		$middleware = $this->middlewareBaseNamespace . "\\" . ucfirst($name);

		if (!class_exists($middleware)) {
			throw new \ErrorException('Le middleware ' . $middleware . ' n\'existe pas');
		}

		$class = new $middleware();
		$next =  call_user_func_array([$class, "handle"], array_slice(func_get_args(), 1));

		if (! $next) {
			die();
		}

		return true;
	}

	/**
	 * Permet de faire des rédirections sur un autre page ou sur l'action du meme controlleur
	 * ou d'un autre controlleur et actioner une methode.
	 *
	 * @param mixed $url
	 * @param array $parameters
	 */
	public function redirect($url, array $parameters = [])
	{
		response()->redirect(url($url, $parameters));
	}
}
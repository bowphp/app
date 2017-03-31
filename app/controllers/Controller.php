<?php
namespace App\controllers;

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
        $middleware = config()->getNamespace();

        if (! array_key_exists($name, $middleware['middlewares'])) {
            throw new \ErrorException('Le middleware ' . $name . ' n\'existe pas');
        }

		$middleware = $this->middlewareBaseNamespace . "\\" . ucfirst($middleware['middlewares'][$name]);

		if (! class_exists($middleware)) {
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
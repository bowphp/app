<?php
namespace App\Controllers;

use Bow\Http\Input;
use Bow\Support\Str;

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
	 * @var Input
	 */
	protected $input;

	public function __construct()
	{
		$this->input = request()->input();
	}

	/**
	 * @var string
	 */
	protected $middlewareBaseNamespace = "App\\Middleware";

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
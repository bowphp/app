<?php
namespace App\Controllers;

use Bow\Application\Actionner;
use Bow\Http\Request;

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

        return Actionner::call(['middleware' => $name], array_values((array) Request::$params), config()->getNamespace());
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
        return response()->redirect(url($url, $parameters));
    }

    /**
     * Permet de charge une vue
     *
     * @param string $name
     * @param array $data
     * @param int $code
     * @return mixed
     */
    public function view($name, array $data = [], $code = 200)
    {
        return view($name, $data, $code);
    }
}
<?php
namespace App\Controllers;

use Bow\Application\Actionner;

class Controller
{
    /**
     * Lanceur de middleware
     *
     * @param  string $name Le nom de middelware.
     * @return mixed
     *
     * @throws \ErrorException
     */
    public function middleware($name)
    {
        $middleware = config('app.classes.middlewares');

        if (! array_key_exists($name, $middleware)) {
            throw new \ErrorException('Le middleware ' . $name . ' n\'existe pas');
        }

        return Actionner::call(['middleware' => $name], [request()], config('app.classes.namespace'));
    }

    /**
     * Permet de faire des rédirections sur un autre page ou sur l'action du meme controlleur
     * ou d'un autre controlleur et actioner une methode.
     *
     * @param  mixed $url
     * @param  array $parameters
     * @return mixed
     */
    public function redirect($url, array $parameters = [])
    {
        return redirect(url($url, $parameters));
    }

    /**
     * Permet de charge une vue
     *
     * @param  string $name
     * @param  array  $data
     * @param  int    $code
     * @return mixed
     */
    public function view($name, array $data = [], $code = 200)
    {
        return view($name, $data, $code);
    }
}
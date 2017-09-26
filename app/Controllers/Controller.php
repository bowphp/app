<?php
namespace App\Controllers;

use Bow\Application\Actionner;

class Controller
{
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

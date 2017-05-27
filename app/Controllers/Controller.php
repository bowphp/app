<?php
namespace App\Controllers;

use Bow\Http\Request;
use Bow\Application\Actionner;

class Controller
{
    /**
     * Controller construct.
     */
    public function __construct()
    {
        $this->firewall('csrf');
    }

    /**
     * Lanceur de firewall
     *
     * @param string $name Le nom de middelware.
     * @return mixed
     *
     * @throws \ErrorException
     */
    public function firewall($name)
    {
        $firewall = config()->getNamespace();

        if (! array_key_exists($name, $firewall['firewalls'])) {
            throw new \ErrorException('Le firewall ' . $name . ' n\'existe pas');
        }

        return Actionner::call(['firewall' => $name], [request()], config()->getNamespace());
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
        return redirect(url($url, $parameters));
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
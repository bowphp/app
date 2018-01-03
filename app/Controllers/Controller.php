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
    public function render($name, array $data = [], $code = 200)
    {
        return view($name, $data, $code);
    }

    /**
     * Get the current user request
     *
     * @return \Bow\Http\Request
     */
    public function request()
    {
        return request();
    }

    /**
     * Get the response instance
     *
     * @return \Bow\Http\Response
     */
    public function response()
    {
        return  response();
    }

    /**
     * Return la configuration de l'application
     *
     * @param  string|array $key
     * @param  mixed        $setting
     * @return Config|mixed
     */
    public function config($key = null, $setting = null)
    {
        return  config($key, $setting);
    }

    /**
     * permet de se connecter sur une autre base de donnée
     * et retourne l'instance de la DB
     *
     * @param string   $name
     * @param callable $cb
     *
     * @return DB
     */
    public function db($name = null, callable $cb = null)
    {
        return call_user_func_array('db', func_get_args());
    }

    /**
     * Alias of table
     *
     * @return \Bow\Database\Query\Builder
     */
    public function table($name, $class = null, $primary_key = null, $connexion = null)
    {
        return  table($name, $class, $primary_key, $connexion);
    }

    /**
     * Retourne id de la derniere insertion en db
     *
     * @return mixed
     */
    public function getLastInsertId()
    {
        return last_insert_id();
    }

    /**
     * Retourne le token généré par l'application.
     *
     * @return string
     */
    public function getToken()
    {
        return csrf_token();
    }

    /**
     * Vérifie le toke généré par l'application.
     *
     * @return bool
     */
    public function verifyToken($strict = false)
    {
        return verify_token($this->getToken(), $strict);
    }
}

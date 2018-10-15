<?php
namespace App\Controllers;

use Bow\Http\Request;
use Bow\Configuration\Loader as Config;
use Bow\Database\Database;
use Bow\Validation\Validate;
use Bow\Validation\Validator;

class Controller
{
    /**
     * Permet de faire des rédirections sur une autre page ou sur l'action du même controlleur
     * ou d'un autre controlleur et actioner une methode.
     *
     * @param  mixed $url
     * @param  array $parameters
     * @return mixed
     */
    public function redirect($url = null, array $parameters = [])
    {
        if (is_null($url)) {
            return redirect();
        }

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
        return response();
    }

    /**
     * Return la configuration de l'application
     *
     * @param  string|array $key
     * @param  mixed        $setting
     * @return Config|null
     */
    public function config($key = null, $setting = null)
    {
        return config($key, $setting);
    }

    /**
     * permet de se connecter sur une autre base de donnée
     * et retourne l'instance de la DB
     *
     * @param string   $name
     * @param callable $cb
     *
     * @return Database
     */
    public function db($name = null, callable $cb = null)
    {
        return call_user_func_array('db', func_get_args());
    }


    /**
     * Alias of table
     *
     * @param $name
     * @param null $class
     * @param null $primary_key
     * @param null $connexion
     * @return \Bow\Database\Query\Builder
     */
    public function table($name, $connexion = null)
    {
        return table($name, $connexion);
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
     * Faire la validation des données de la requête
     * en fonction des règles passées en paramètre
     *
     * @param Request $request
     * @param array $rule
     * @return Validate
     */
    protected function validate(Request $request, array $rule)
    {
        $validation = Validator::make($request->all(), $rule);

        return $validation;
    }
}

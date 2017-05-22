<?php
namespace Bow\Session;

use Bow\Support\Str;
use Bow\Security\Security;
use InvalidArgumentException;
use Bow\Interfaces\CollectionAccessStatic;

/**
 * Class Session
 *
 * @author Franck Dakia <dakiafranck@gmail.com>
 * @package Bow\Support
 */
class Session implements CollectionAccessStatic
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        static::start();
    }

    /**
     * Session starteur.
     */
    public static function start()
    {
        if (PHP_SESSION_ACTIVE != session_status()) {
            return true;
        }

        session_name("BSESSID");

        if (! isset($_COOKIE["SESSID"])) {
            session_id(hash("sha256", Security::encrypt(uniqid(microtime(false)))));
        }

        return @session_start();
    }

    /**
     * Permet de filter les variables définie par l'utilisateur
     * et celles utilisé par le framework.
     *
     * @return array
     */
    private static function filter()
    {
        $arr = [];
        static::start();

        foreach($_SESSION as $key => $value) {
            if (! in_array($key, ["__bow.flash", "__bow.old", "__bow.event.listener", "__bow.csrf", "__bow.cookie.secure"])) {
                $arr[$key] = $value;
            }
        }

        return $arr;
    }

    /**
     * Permet de vérifier l'existance une clé dans la colléction de session
     *
     * @param string $key
     * @param bool $strict
     *
     * @return boolean
     */
    public static function has($key, $strict = false)
    {
        static::start();

        if (! isset($_SESSION[$key])) {
            return isset($_SESSION['__bow.flash'][$key]);
        }

        return true;
    }

    /**
     * Permet de vérifier si une colléction est vide.
     *
     *	@return boolean
     */
    public static function isEmpty()
    {
        return empty(self::filter());
    }

    /**
     * Permet de récupérer une valeur ou la colléction de valeur.
     *
     * @param string $key=null
     * @param mixed $default
     *
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        static::start();

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        if (isset($_SESSION["__bow.flash"][$key])) {
            $flash = $_SESSION["__bow.flash"][$key];
            unset($_SESSION["__bow.flash"][$key]);
            return $flash;
        }

        if (is_callable($default)) {
            return $default();
        }

        return $default;
    }

    /**
     * Permet d'ajouter une entrée dans la colléction
     *
     * @param string|int $key La clé de la donnée à ajouter
     * @param mixed $data La donnée à ajouter
     * @param boolean $next Elle permet si elle est a true d'ajouter la donnée si la clé existe
     *                      Dans un tableau
     *
     * @throws InvalidArgumentException
     * @return mixed
     */
    public static function add($key, $data, $next = false)
    {
        static::start();

        if ($next !== true) {
            return $_SESSION[$key] = $data;
        }

        if (! static::has($key)) {
            $_SESSION[$key] = $data;
        }

        if (! is_array($_SESSION[$key])) {
            $_SESSION[$key] = [$_SESSION[$key]];
        }
        array_push($_SESSION[$key], $data);
        return $data;
    }

    /**
     * Retourne la liste des variables de session
     *
     * @return array
     */
    public static function all()
    {
        return static::filter();
    }

    /**
     * remove, supprime une entrée dans la colléction
     *
     * @param string $key La clé de l'élément a supprimé
     *
     * @return mixed
     */
    public static function remove($key)
    {
        self::start();
        $old = null;
        if (isset($_SESSION[$key])) {
            $old = $_SESSION[$key];
        }
        unset($_SESSION[$key]);
        return $old;
    }

    /**
     * set
     *
     * @param string $key
     * @param mixed $value
     *
     * @return mixed
     */
    public static function set($key, $value)
    {
        $old = null;
        static::start();

        if (static::has($key)) {
            $old = $_SESSION[$key];
            $_SESSION[$key] = $value;
        } else {
            $_SESSION[$key] = $value;
        }

        return $old;
    }

    /**
     * flash
     *
     * @param mixed $key
     * @param mixed $message
     * @return mixed
     */
    public static function flash($key, $message = null)
    {
        static::start();

        if (! static::has("__bow.flash")) {
            $_SESSION["__bow.flash"] = [];
        }

        if ($message !== null) {
            $_SESSION["__bow.flash"][$key] = $message;
            return true;
        }

        return isset($_SESSION["__bow.flash"][$key]) ? $_SESSION["__bow.flash"][$key] : null;
    }

    /**
     * Retourne la liste des données de la session sous forme de tableau.
     *
     * @return array
     */
    public static function toArray()
    {
        return self::filter();
    }

    /**
     * Vide le système de flash.
     */
    public static function clearFash()
    {
        static::start();
        $_SESSION["__bow.flash"] = [];
    }

    /**
     * clear, permet de vider le cache sauf csrf|bow.flash
     */
    public static function clear()
    {
        static::start();

        foreach(static::filter() as $key => $value){
            unset($_SESSION[$key]);
        }

        unset($_SESSION['__bow.csrf']);
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        static::start();
        return json_encode(static::filter());
    }

    /**
     * __call
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists(static::class, $name)) {
            return call_user_func_array([static::class, $name], $arguments);
        }

        throw new \BadMethodCallException('La methode ' . $name . ' n\'exist pas.');
    }
}

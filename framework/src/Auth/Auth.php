<?php

namespace Bow\Auth;

class Auth
{
    /**
     * Configure Auth system
     * 
     * @param array $config
     */
    public static function configure(array $config)
    {
        static::$config = $config;
    }

    /**
     * Check if user is authenticate
     *
     * @return bool
     */
    public static function check()
    {
        return true;
    }

    /**
     * Check if user is authenticate
     *
     * @return bool
     */
    public static function user()
    {
        return true;
    }

    /**
     * Check if user is authenticate
     *
     * @return bool
     */
    public static function attempts(array $credentials)
    {
        return true;
    }

    /**
     * Check if user is authenticate
     *
     * @return bool
     */
    public static function attempts(array $credentials)
    {
        return true;
    }

    /**
     * __call
     * 
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists(static::class, $method)) {
            return call_user_func_array([static, $method], $parameters);
        }

        throw new BadMethodCallException("la methode $methode n'existe pas", 1);
    }
}
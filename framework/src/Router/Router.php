<?php

namespace Bow\Router;

use Bow\Router\Route\Collection as RouteCollection;

class Router
{
    /**
     * @var string
     */
    private $config;

    /**
     * @var RouteCollection
     */
    private $collection;

    /**
     * @var string
     */
    private $namespace;

    /**
     * Router constructor.
     *
     * @param $config
     * @param RouteCollection $collection
     */
    public function __construct($config, RouteCollection $collection)
    {
        $this->config = $config;
        $this->namespace = $config->namespaces();
        $this->collection = $collection;
    }

    /**
     * @return string
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return RouteCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }


    /**
     * get, route de type GET ou bien retourne les variable ajoutés dans Bow
     *
     * @param string         $path
     * @param callable|array $cb
     *
     * @return Route
     */
    public function get($path, $cb)
    {
        return $this->routeLoader('GET', $path, $cb);
    }

    /**
     * post, route de type POST
     *
     * @param string   $path
     * @param callable $cb
     *
     * @return Route
     */
    public function post($path, $cb)
    {
        return $this->routeLoader('POST', $path, $cb);
    }

    /**
     * any, route de tout type GET|POST|DELETE|PUT|OPTIONS|PATCH
     *
     * @param string   $path
     * @param Callable $cb
     *
     * @return Route
     */
    public function any($path, callable $cb)
    {
        foreach (['options', 'patch', 'post', 'delete', 'put', 'get'] as $method) {
            $this->$method($path, $cb);
        }

        return $this;
    }

    /**
     * delete, route de tout type DELETE
     *
     * @param string   $path
     * @param callable $cb
     *
     * @return Route
     */
    public function delete($path, $cb)
    {
        return $this->pushHttpVerbe('DELETE', $path, $cb);
    }

    /**
     * put, route de tout type PUT
     *
     * @param string   $path
     * @param callable $cb
     *
     * @return Route
     */
    public function put($path, $cb)
    {
        return $this->pushHttpVerbe('PUT', $path, $cb);
    }

    /**
     * patch, route de tout type PATCH
     *
     * @param string   $path
     * @param callable $cb
     *
     * @return Route
     */
    public function patch($path, $cb)
    {
        return $this->pushHttpVerbe('PATCH', $path, $cb);
    }

    /**
     * patch, route de tout type PATCH
     *
     * @param  string   $path
     * @param  callable $cb
     * @return Route
     */
    public function options($path, callable $cb)
    {
        return $this->pushHttpVerbe('OPTIONS', $path, $cb);
    }

    /**
     * code, Lance une fonction en fonction du code d'erreur HTTP
     *
     * @param  int      $code
     * @param  callable $cb
     * @return Route
     */
    public function code($code, callable $cb)
    {
        $this->statusRoutes[$code] = $cb;
        return $this;
    }

    /**
     * match, route de tout type de method
     *
     * @param  array    $methods
     * @param  string   $path
     * @param  callable $cb
     * @return Route
     */
    public function match(array $methods, $path, callable $cb = null)
    {
        foreach ($methods as $method) {
            $this->routeLoader(strtoupper($method), $path, $cb);
        }

        return $this;
    }
}

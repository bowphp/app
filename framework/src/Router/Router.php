<?php

namespace Bow\Router;

use RouteCollection;

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
     * Router constructor.
     *
     * @param $config
     * @param RouteCollection $collection
     */
    public function __construct($config, RouteCollection $collection)
    {
        $this->config = $config;
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
}
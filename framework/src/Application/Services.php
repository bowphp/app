<?php

namespace Bow\Application;

use Bow\Event\Event;

abstract class Services
{
    protected $app;

    /**
     * Services constructor.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Permet de créer le service
     * 
     * @param Application $app
     */
    abstract public function make($app);

    /**
     * Permet de lancer le service
     * 
     * @return mixed
     */
    abstract public function start();

    /**
     * Start listener
     * 
     * @param callable $cb
     */
    public function stared($cb)
    {
        Event::once(static::class.'.service.started', $cb);
    }

    /**
     * Make listener
     * 
     * @param callable $cb
     */
    public function maked($cb)
    {
        Event::once(static::class.'.service.maked', $cb);
    }

    /**
     * Get la service class name
     * 
     * @return string
     */
    public function getName()
    {
        return get_called_class();
    }
}
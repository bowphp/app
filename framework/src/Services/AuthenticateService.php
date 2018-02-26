<?php

namespace Bow\Services;

use Bow\Auth\Auth;
use Bow\Config\Config;
use Bow\Application\Services as BowService;

class AuthenticateService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Auth::class, function () use ($config) {
            return Auth::configure($config->namespaces(), $config->middlewares());
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Auth::class);
    }
}

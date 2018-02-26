<?php

namespace Bow\Services;

use Bow\Config\Config;
use Bow\Support\Capsule;
use Bow\Application\Actionner;
use Bow\Application\Services as BowService;

class ActionnerService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Actionner::class, function () use ($config) {
            return Actionner::configure($config->namespaces(), $config->middlewares());
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Actionner::class);
    }
}

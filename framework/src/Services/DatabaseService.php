<?php

namespace Bow\Services;

use Bow\Config\Config;
use Bow\Database\Database;
use Bow\Application\Services as BowService;

class DatabaseServer extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Database::class, function () use ($config) {
            return Database::configure($config['db']);
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Database::class);
    }
}

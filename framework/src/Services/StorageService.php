<?php

namespace Bow\Services;

use Bow\Config\Config;
use Bow\Support\Capsule;
use Bow\Resource\Storage;
use Bow\Application\Services as BowService;

class StorageService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Storage::class, function () use ($config) {
            return Storage::configure($config['resource']);
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Storage::class);
    }
}

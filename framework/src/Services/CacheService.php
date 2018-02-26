<?php

namespace Bow\Services;

use Bow\Http\Cache;
use Bow\Config\Config;
use Bow\Support\Capsule;
use Bow\Application\Services as BowService;

class CacheService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Cache::class, function () use ($config) {
            return Cache::confirgure($config['resource.cache'].'/bow');
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Cache::class);
    }
}

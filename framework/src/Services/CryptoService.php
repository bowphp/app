<?php

namespace Bow\Services;

use Bow\Config\Config;
use Bow\Security\Crypto;
use Bow\Application\Services as BowService;

class CryptoService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Crypto::class, function () use ($config) {
            return Crypto::setkey(
                $config['security.key'],
                $config['security.cipher']
            );
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Crypto::class);
    }
}

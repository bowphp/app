<?php

namespace Bow\Services;

use Bow\Mail\Mail;
use Bow\Config\Config;
use Bow\Support\Capsule;
use Bow\Application\Services as BowService;

class MailService extends BowService
{
    /**
     * Configuration du service
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        $this->app(Mail::class, function () use ($config) {
            return Mail::configure($config['mail']);
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(Mail::class);
    }
}

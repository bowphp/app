<?php

namespace Bow\Services;

use Bow\View\View;
use Bow\Config\Config;
use Bow\Application\Services as BowService;

class ViewService extends BowService
{
    /**
     * __
     *
     * @param Config $config
     * @return void
     */
    public function make(Config $config)
    {
        /**
         * Configuration de translator
         */
        $this->app(Translator::class, function () use ($config) {
            View::configure($config);
        });
    }

    /**
     * Démarrage du service
     *
     * @return void
     */
    public function start()
    {
        $this->app(View::class);
    }
}

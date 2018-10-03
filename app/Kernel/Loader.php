<?php

namespace App\Kernel;

use Bow\Configuration\Loader as ApplicationLoader;

class Loader extends ApplicationLoader
{
    /**
     * Get app namespace
     *
     * @return array
     */
    public function namespaces()
    {
        return [
            'controller' => 'App\\Papac\\Controllers',
            'middleware' => 'App\\Middleware',
            'configuration' => 'App\\Configurations',
            'validation' => 'App\\Validations',
            'model' => 'App',
        ];
    }

    /**
     * The middleware lists
     *
     * @return array
     */
    public function middlewares()
    {
        return [
            'csrf' => \Bow\Middleware\CsrfMiddleware::class,
            'trim' => \Bow\Middleware\TrimMiddleware::class,
            'auth' => \App\Middleware\Authenticate::class,
            'guest' => \App\Middleware\Guest::class,
        ];
    }

    /**
     * All app configurations register
     *
     * @return array
     */
    public function configurations()
    {
        return [
            // Chargement des environement
            \Bow\Services\EnvConfiguration::class,

            // Service interne
            \Bow\Mail\MailConfiguration::class,
            \Bow\Security\CryptoConfiguration::class,
            \Bow\Database\DatabaseConfiguration::class,
            \Bow\Configurations\CacheConfiguration::class,
            \Bow\Resource\StorageConfiguration::class,
            \Bow\View\ViewConfiguration::class,
            \Bow\Translate\TranslatorConfiguration::class,
            \Bow\Auth\AuthenticateConfiguration::class,
            \Bow\Configurations\ActionnerConfiguration::class,
            \Bow\Configurations\LoggerConfiguration::class

            // Vos service
        ];
    }

    /**
     * Service Bootstrap
     */
    public function boot()
    {
        parent::boot();
    }
}

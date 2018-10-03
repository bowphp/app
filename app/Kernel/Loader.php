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
            /**
             * Configuration interne du framework 
             */
            \Bow\Configuration\Configurations\EnvConfiguration::class,

            \Bow\Mail\MailConfiguration::class,
            \Bow\Security\CryptoConfiguration::class,
            \Bow\Database\DatabaseConfiguration::class,
            \Bow\Storage\StorageConfiguration::class,
            \Bow\View\ViewConfiguration::class,
            \Bow\Translate\TranslatorConfiguration::class,
            \Bow\Auth\AuthenticateConfiguration::class,
    
            \Bow\Configuration\Configurations\CacheConfiguration::class,
            \Bow\Configuration\Configurations\ActionnerConfiguration::class,
            \Bow\Configuration\Configurations\LoggerConfiguration::class

            /**
             * Ajoutez vos Configuration personnalisé ici.
             */
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

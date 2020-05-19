<?php

namespace App;

use Bow\Configuration\Loader as ApplicationLoader;

class Kernel extends ApplicationLoader
{
    /**
     * Get app namespace
     *
     * @return array
     */
    public function namespaces()
    {
        return [
            'controller' => 'App\\Controllers',
            'middleware' => 'App\\Middlewares',
            'configuration' => 'App\\Configurations',
            'validation' => 'App\\Validations',
            'model' => 'App\\Models',
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
            'csrf' => \App\Middlewares\ClientCsrfMiddleware::class,
            'auth' => \App\Middlewares\Authenticate::class,
            'guest' => \App\Middlewares\Guest::class
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
            \Bow\Configuration\Configurations\LoggerConfiguration::class,
            \Bow\Configuration\Configurations\EnvConfiguration::class,
            
            \Bow\Cache\CacheConfiguration::class,
            \Bow\Mail\MailConfiguration::class,
            \Bow\Security\CryptoConfiguration::class,
            \Bow\Database\DatabaseConfiguration::class,
            \Bow\Storage\StorageConfiguration::class,
            \Bow\View\ViewConfiguration::class,
            \Bow\Translate\TranslatorConfiguration::class,
            \Bow\Auth\AuthenticateConfiguration::class,
            \Bow\Session\SessionConfiguration::class,

            /**
             * Add your Custom Settings here.
             */
            // \Policier\Bow\PolicierConfiguration::class,
        ];
    }

    /**
     * Service Bootstrap
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

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
            'service' => 'App\\Services',
            'event' => 'App\\Events',
            'exception' => 'App\\Exceptions',
            'producer' => 'App\\Producers',
            'command' => 'App\\Commands',
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
            'csrf' => \App\Middlewares\RequestCsrfMiddleware::class,
            'auth' => \App\Middlewares\AuthenticateMiddleware::class,
            'guest' => \App\Middlewares\GuestMiddleware::class
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
             * Internal configuration of the framework
             */
            \Bow\Configuration\LoggerConfiguration::class,
            \Bow\Configuration\EnvConfiguration::class,

            \Bow\Cache\CacheConfiguration::class,
            \Bow\Mail\MailConfiguration::class,
            \Bow\Security\CryptoConfiguration::class,
            \Bow\Database\DatabaseConfiguration::class,
            \Bow\Storage\StorageConfiguration::class,
            \Bow\View\ViewConfiguration::class,
            \Bow\Translate\TranslatorConfiguration::class,
            \Bow\Auth\AuthenticationConfiguration::class,
            \Bow\Session\SessionConfiguration::class,
            \Bow\Queue\QueueConfiguration::class,

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

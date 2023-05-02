<?php

namespace App;

use Bow\Configuration\Loader as ApplicationLoader;

class Kernel extends ApplicationLoader
{
    /**
     * Define your events
     *
     * @return array
     */
    public function events(): array
    {
        return [
            // Put your event here
            // "user.created" => UserCreatedListener::class
        ];
    }

    /**
     * Define the app namespace
     *
     * @return array
     */
    public function namespaces(): array
    {
        return [
            'controller' => 'App\\Controllers',
            'middleware' => 'App\\Middlewares',
            'configuration' => 'App\\Configurations',
            'validation' => 'App\\Validations',
            'model' => 'App\\Models',
            'service' => 'App\\Services',
            'event' => 'App\\Events',
            'listener' => 'App\\Listeners',
            'exception' => 'App\\Exceptions',
            'producer' => 'App\\Producers',
            'command' => 'App\\Commands',
        ];
    }

    /**
     * Define the app middlewares
     *
     * @return array
     */
    public function middlewares(): array
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
    public function configurations(): array
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

            /**
             * Should be the last to loading
             */
            \App\Configurations\ApplicationConfiguration::class,
        ];
    }

    /**
     * Service Bootstrap
     *
     * @return ApplicationLoader
     */
    public function boot(): ApplicationLoader
    {
        parent::boot();

        return $this;
    }
}

<?php

namespace App\Kernel;

use Bow\Auth\Auth;
use Bow\Mail\Mail;
use Bow\View\View;
use Bow\Http\Cache;
use Bow\Config\Config;
use Bow\Security\Crypto;
use Bow\Resource\Storage;
use Bow\Support\DateAccess;
use Bow\Database\Database;
use Bow\Translate\Translator;
use Bow\Application\Actionner;

class Loader extends Config
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
            'middleware' => 'App\\Middleware'
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
     * All app services register
     *
     * @return array
     */
    public function services()
    {
        return [
            // Service interne
            \Bow\Services\LoggerService::class,
            \Bow\Mail\MailService::class,
            \Bow\Security\CryptoService::class,
            \Bow\Database\DatabaseService::class,
            \Bow\Services\CacheService::class,
            \Bow\Resource\StorageService::class,
            \Bow\View\ViewService::class,
            \Bow\Translate\TranslatorService::class,
            \Bow\Auth\AuthenticateService::class,
            \Bow\Services\ActionnerService::class

            // Vos service
        ];
    }

    /**
     * @inheritdoc
     */
    public function loadRouteCollection()
    {
        $this->routePath = __DIR__.'/../../routes/app.php';
    }
}

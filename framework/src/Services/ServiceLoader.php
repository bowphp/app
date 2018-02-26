<?php

namespace Bow\Services;

use Bow\Application\Services as BowService;

class ServiceLoader
{
    /**
     * @var array
     */
    private static $services = [
        \Bow\Application\Services\MailService::class,
        \Bow\Application\Services\CryptoService::class,
        \Bow\Application\Services\DatabaseService::class,
        \Bow\Application\Services\CacheService::class,
        \Bow\Application\Services\StorageService::class,
        \Bow\Application\Services\ViewService::class,
        \Bow\Application\Services\TranslatorService::class,
        \Bow\Application\Services\AuthService::class,
        \Bow\Application\Services\ActionnerService::class
    ];

    /**
     * Retourne la liste des services chargés
     *
     * @return void
     */
    public static function load()
    {
        return static::$services;
    }
}

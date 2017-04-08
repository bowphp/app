<?php
return [

    // Liste de namespace valide de l'applicareqtion
    'namespace' => [
        'controller' => 'App\\Controller',
        'middleware' => 'App\\Middleware'
    ],

    // Liste d'alias vers les principaux classes de Bow
    'aliases' => [
        'DB' => \Bow\Database\Database::class,
        'Database' => \Bow\Database\Database::class,
        'Request' => \Bow\Http\Request::class,
        'Req' => \Bow\Http\Request::class,
        'Response' => \Bow\Http\Response::class,
        'Res' => \Bow\Http\Response::class,
        'Input' => \Bow\Http\Input::class,
        'Secure' => \Bow\Security\Security::class,
        'Cookie' => \Bow\Session\Cookie::class,
        'Cache' => \Bow\Http\Cache::class,
    ],

    // Liste de middleware
    // * ici quand vous générez un middleware
    // * il faudra l'enregistré dans ce tableau avec le même de nom de classe
    // e.g: ['csrf' => 'VerifyToken', 'autre nom de middleware']
    'middlewares' => [
        'csrf' => \App\Middleware\VerifyToken::class
    ],

    // autoload de l'application
    'autoload' => __DIR__ . '/autoload'
];
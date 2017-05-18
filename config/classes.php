<?php
return [

    // Liste de namespace valide de l'applicareqtion
    'namespace' => [
        'controller' => 'App\\Controllers',
        'firewall' => 'App\\Firewall'
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

    // Liste des fierwalls
    // * ici quand vous générez un fierwall
    // * il faudra l'enregistré dans ce tableau avec le même de nom de classe
    // e.g: ['csrf' => 'VerifyToken', 'autre nom de fierwall']
    'firewalls' => [
        'csrf' => \App\Firewall\VerifyToken::class
    ],

    // autoload de l'application
    'autoload' => __DIR__ . '/autoload'
];
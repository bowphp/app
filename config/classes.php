<?php
return [

    // Liste de namespace valide de l'applicareqtion
    'namespace' => [
        'controller' => 'App\\Controllers',
        'firewall' => 'App\\Firewall'
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
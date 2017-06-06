<?php
return [
    /**
     * Liste de namespace valide de l'applicareqtion
     */
    'namespace' => [
        'controller' => 'App\\Controllers',
        'firewall' => 'App\\Firewall'
    ],

    /**
     * Liste des fierwalls
     * ici quand vous générez un fierwall
     * il faudra l'enregistré dans ce tableau avec le même de nom de classe
     * e.g: ['csrf' => '\App\Firewall\TestFirewall', 'autre nom de fierwall']
     */
    'firewalls' => [
        'test' => App\Firewall\TestFirewall::class
    ],

    /**
     * Liste service des services
     */
    'services' => [
        /**
         * Mettez ici vos service.
         */
    ]
];
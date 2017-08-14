<?php
return [
    /**
     * Liste de namespace valide de l'applicareqtion
     */
    'namespace' => [
        'controller' => 'App\\Controllers',
        'middleware' => 'App\\Middleware'
    ],

    /**
     * Liste des fierwalls
     * ici quand vous générez un fierwall
     * il faudra l'enregistré dans ce tableau avec le même de nom de classe
     * e.g: ['csrf' => '\App\Middleware\TestMiddleware', 'autre nom de fierwall']
     */
    'middlewares' => [
        'test' => Bow\Middleware\ApplicationCsrfMiddleware::class
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
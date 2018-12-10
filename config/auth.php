<?php

return [
    /**
     * Branche par de défaut de connection
     */
    "default" => "web",

    /**
     * Branche d'authentification par défaut
     */
    "web" => [
        "type" => "model",
        'model' => App\User::class
    ],

    /**
     * Autre branche d'authentification
     */
    "admin" => [
        'type' => "model",
        "model" => App\User::class
    ]
];

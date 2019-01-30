<?php

return [
    /**
     * Branch by default of connection
     */
    "default" => "web",

    /**
     * Default authentication branch
     */
    "web" => [
        "type" => "model",
        'model' => App\Model\User::class
    ],

    /**
     * Other authentication branch
     */
    "admin" => [
        'type' => "model",
        "model" => App\Model\User::class
    ]
];

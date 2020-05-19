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
        "type" => "session",
        'model' => App\Models\User::class,
        'credentials' => [
            'username' => 'email',
            'password' => 'password'
        ]
    ],

    /**
     * Other authentication branch
     */
    "admin" => [
        'type' => "session",
        "model" => App\Models\User::class,
        'credentials' => [
            'username' => 'email',
            'password' => 'password'
        ]
    ],

    /**
     * Default authentication branch
     */
    "api" => [
        "type" => "jwt",
        'model' => App\Models\User::class,
        'credentials' => [
            'username' => 'email',
            'password' => 'password'
        ]
    ],

];

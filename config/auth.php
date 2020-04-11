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
        "type" => "jwt",
        'model' => App\Model\User::class,
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
        "model" => App\Model\User::class,
        'credentials' => [
            'username' => 'email',
            'password' => 'password'
        ]
    ]
];

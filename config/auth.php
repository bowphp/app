<?php

return [
    "default" => "web",

    "web" => [
        "type" => "model",
        'model' => App\User::class
    ],

    "api" => [
        'type' => "jwt",
        "model" => App\User::class
    ]
];

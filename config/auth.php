<?php

return [
    "default" => "web",

    "web" => [
        "type" => "model",
        'model' => App\User::class
    ],

    "api" => [
        'tyoe' => "jwt",
        "model" => App\User::class
    ]
];

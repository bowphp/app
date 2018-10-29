<?php

return [
    "default" => "web",

    "web" => [
        "type" => "model",
        'model' => App\User::class
    ],

    "admin" => [
        'type' => "model",
        "model" => App\User::class
    ]
];

<?php

return [
    "local" => [
        "storage_dir" => dirname(__DIR__) . "/storage"
    ],
    "ftp" => [
        "username" => "your username",
        "password" => "your password",
        "root" => "~",
        "secure" => true,
        "port" => 21,
        "timeout" => null,
        "passive" => false
    ]
];

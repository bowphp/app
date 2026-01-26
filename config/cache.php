<?php

return [
    // Define the default store
    "default" => "file",

    "stores" => [
        // The filesystem connection
        "file" => [
            "driver" => "file",
            "path" => __DIR__ . '/../var/cache',
            "prefix" => "",
        ],

        // The database connection
        "database" => [
            "driver" => "database",
            "connection" => app_env('DB_DEFAULT', 'mysql'),
            "table" => "caches",
            "prefix" => "",
        ],

        // The redis connection
        "redis" => [
            'driver' => 'redis',
            'database' => app_env('REDIS_CACHE_DB', 5),
            "prefix" => "",
        ]
    ]
];

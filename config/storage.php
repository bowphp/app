<?php

return [
    /**
     * Log directory
     */
    'log' => __DIR__ . '/../var/logs',

    /**
     * Store location using the disk system
     */
    'disk' => [
        'mount' => 'storage',
        'path' => [
            'storage' => __DIR__ . '/../var/storage',
            'public' => __DIR__ . '/../public',
        ]
    ],

    /**
     * External storage service list
     */
    "services" => [
        /**
         * FTP configuration
         */
        'ftp' => [
            'driver' => 'ftp',
            'hostname' => app_env('FTP_HOSTNAME'),
            'password' => app_env('FTP_PASSWORD'),
            'username' => app_env('FTP_USERNAME'),
            'port'     => app_env('FTP_PORT', 21),
            'root' => app_env('FTP_STARTROOT', null),
            'tls' => app_env('FTP_TLS', false),
            'timeout' => app_env('FTP_TIMEOUT', 50)
        ],

        /**
         * S3 configuration
         * Supports both AWS S3 and MinIO (S3-compatible storage)
         */
        's3' => [
            'driver' => 's3',
            'bucket' => app_env('S3_BUCKET', 'settlements'),
            'region' => app_env('AWS_REGION', 'us-east-1'),
            'version' => 'latest',
            'credentials' => [
                'key'    => app_env('AWS_KEY'),
                'secret' => app_env('AWS_SECRET'),
            ],
            // MinIO configuration (optional)
            'endpoint' => app_env('AWS_ENDPOINT'), // e.g., 'http://localhost:9000' for MinIO
            'use_path_style_endpoint' => app_env('AWS_USE_PATH_STYLE_ENDPOINT', false), // Set to true for MinIO
        ],
    ],
];

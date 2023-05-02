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
            // The basic folder of the server
            'root' => app_env('FTP_STARTROOT', null),
            // A `true` to activate a secure connection.
            'tls' => app_env('FTP_TLS', false),
            // Connection waiting time
            'timeout' => app_env('FTP_TIMEOUT', 50)
        ],

        /**
         * S3 configuration
         */
        's3' => [
            'driver' => 's3',
            'credentials' => [
                'key'    => app_env('S3_KEY'),
                'secret' => app_env('S3_SECRET'),
            ],
            'bucket' => app_env('S3_BUCKET'),
            'region' => app_env('S3_REGION'),
            'version' => 'latest'
        ]
    ],
];

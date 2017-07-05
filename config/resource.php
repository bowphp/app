<?php
/**
 * Fichier de configuration de la classe réssource
 */
return [
    /**
     * Store location
     */
    'storage' => dirname(__DIR__).'/storage/app',

    /**
     * Store location utilisant le systeme de disk
     */
    'disk' =>[
        'mount' => 'storage',
        'path' => [
            'storage' => dirname(__DIR__).'/storage/app',
            'public' => dirname(__DIR__).'/public',
        ]
    ],

    /**
     * Repertoire de log
     */
    'log' => dirname(__DIR__).'/storage/logs',

    /**
     * Repertoure de cache
     */
    'cache' => dirname(__DIR__).'/storage/cache',

    /**
     * FTP configuration
     */
    'ftp' => [
        'hostname' => env('FTP_HOSTNAME'),
        'password' => env('FTP_PASSWORD'),
        'username' => env('FTP_USERNAME'),
        'port'     => env('FTP_PORT', 21),
        'root' => env('FTP_STARTROOT', null), // Le dossier de base du serveur
        'tls' => env('FTP_TLS', false), // A `true` pour activer une connection sécurisé.
        'timeout' => env('FTP_TIMEOUT', 50) // Temps d'attente de connection
    ],

    /**
     * S3 configuration
     */
    's3' => [
        'credentials' => [
            'key'    => env('S3_KEY'),
            'secret' => env('S3_SECRET'),
        ],
        'bucket' => env('S3_BUCKET'),
        'region' => env('S3_REGION'),
        'version' => 'latest'
    ]
];

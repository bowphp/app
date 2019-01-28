<?php
/**
 * Fichier de configuration de la classe réssource
 */
return [
    /**
     * Store location utilisant le systeme de disk
     */
    'disk' =>[
        'mount' => 'storage',
        'path' => [
            'storage' => __DIR__.'/../var/storage',
            'public' => __DIR__.'/../public',
        ]
    ],

    /**
     * Liste de service externe de stockage
     */
    "services" => [
        /**
         * FTP configuration
         */
        'ftp' => [
            'hostname' => app_env('FTP_HOSTNAME'),
            'password' => app_env('FTP_PASSWORD'),
            'username' => app_env('FTP_USERNAME'),
            'port'     => app_env('FTP_PORT', 21),
            'root' => app_env('FTP_STARTROOT', null), // Le dossier de base du serveur
            'tls' => app_env('FTP_TLS', false), // A `true` pour activer une connection sécurisé.
            'timeout' => app_env('FTP_TIMEOUT', 50) // Temps d'attente de connection
        ],

        /**
         * S3 configuration
         */
        's3' => [
            'credentials' => [
                'key'    => app_env('S3_KEY'),
                'secret' => app_env('S3_SECRET'),
            ],
            'bucket' => app_env('S3_BUCKET'),
            'region' => app_env('S3_REGION'),
            'version' => 'latest'
        ]
    ],
    
    /**
     * Repertoire de log
     */
    'log' => __DIR__.'/../var/logs',

    /**
     * Repertoure de cache
     */
    'cache' => __DIR__ . '/../var/cache',
];

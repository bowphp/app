<?php
/**
 * Configuration de la base donnée.
 * On retourne la configuration
 * des bases de données utilisées par l'application.
 * support mysql
 */
return [
    /**
     * Fetch mode.
     */
    'fetch' => PDO::FETCH_OBJ,

    /**
     * le point de connexion par defaut
     */
    'default' => env('DB_DEFAULT', 'first'),

    /**
     * La base de donnée sur laquelle se connectera l'application par défaut
     * La base de donnée par defaut, c'est sur cette base de donnée que vap va
     * se connecte automatique. Alors vous ne devez absolument pas modifier
     * la cle 'default'.
     *
     * Dans le case contraire vous devez executer le code dans chaque route.
     * `db('le nom de cle')` or
     * `Bow\Database\Database::connection('le nom de la clé')`
     */
    'connection' => [
        /**
         * Connexion mysql
         */
        'mysql' => [
            'hostname' => app_env('MYSQL_HOSTNAME', 'localhost'),
            'username' => app_env('MYSQL_USERNAME', 'test'),
            'password' => app_env('MYSQL_PASSWORD', 'test'),
            'database' => app_env('MYSQL_DBMAME', 'test'),
            'charset'  => app_env('MYSQL_CHARSET', 'utf8mb4'),
            'collation' => app_env('MYSQL_COLLATION', 'utf8mb4_unicode_ci'),
            'engine' => app_env('MYSQL_ENGINE', 'InnoDB'),
            'prefix' => app_env('MYSQL_PREFIX', ''),
            'port' => app_env('MYSQL_PORT', 3306),
            'socket' => app_env('MYSQL_SOCKET', null)
        ],

        /**
         * Connexion sqlite
         */
        'sqlite' => [
            'driver' => app_env('SQLITE_DRIVER'),
            'database' => app_env('SQLITE_DATABASE', __DIR__.'/../storage/database.sqlite'),
            'charset'  => app_env('SQLITE_CHARSET', 'utf8'),
            'prefix' => app_env('SQLITE_PREFIX', '')
        ]
    ]
];

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
    'first' => [
        // represente sur quel SGDB le site va se connecté.
        'scheme' => 'mysql',

        // la configuration de mysql
        'mysql' => [
            'hostname' => env('MYSQL_HOSTNAME', 'localhost'),
            'username' => env('MYSQL_USERNAME', 'test'),
            'password' => env('MYSQL_PASSWORD', 'test'),
            'database' => env('MYSQL_DBMAME', 'test'),
            'charset'  => env('MYSQL_CHARSET', 'utf8mb4'),
            'collation' => env('MYSQL_COLLATION', 'utf8mb4_unicode_ci'),
            'engine' => env('MYSQL_ENGINE', 'InnoDB'),
            'prefix' => env('MYSQL_PREFIX', ''),
            'port' => env('MYSQL_PORT', 3306),
            'socket' => env('MYSQL_SOCKET', null)
        ]
    ],

    /**
     * La definition d'une autre base de donnee.
     * Tel que sqlite par exemple.
     */
    'seconds' => [
        'scheme' => env('SQLITE_SCHEME', 'sqlite'),

        'sqlite' => [
            'driver' => env('SQLITE_DRIVER', __DIR__.'/../storage/database.sqlite'),
            'database' => env('SQLITE_DATABASE', ''),
            'charset'  => env('SQLITE_CHARSET', 'utf8'),
            'prefix' => env('SQLITE_PREFIX', '')
        ]
    ]
];

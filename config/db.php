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
     * La base séléctionné par defaut
     */
    'default' => app_env('DB_DEFAULT', 'first'),

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
            'hostname' => app_env('MYSQL_HOSTNAME', 'localhost'),
            'username' => app_env('MYSQL_USERNAME', 'test'),
            'password' => app_env('MYSQL_PASSWORD', 'test'),
            'database' => app_env('MYSQL_DBMAME', 'test'),
            'charset'  => app_env('MYSQL_CHARSET', 'charset'),
            'collation' => app_env('MYSQL_COLLATION', 'utf8_unicode_ci'),
            'prefix' => app_env('MYSQL_PREFIX', ''),
            'port' => app_env('MYSQL_PORT', 3306),
            'socket' => app_env('MYSQL_SOCKET', null)
        ]
    ],

    /**
     * La definition d'une autre base de donnee.
     * Tel que sqlite par exemple.
     */
    'seconds' => [
        'scheme' => app_env('SQLITE_SCHEME', 'sqlite'),
        'sqlite' => [
            'driver' => app_env('SQLITE_DRIVER', 'sqlite'),
            'database' => __DIR__.'/../storage/sqlite/data.sqlite',
            'charset'  => app_env('SQLITE_CHARSET', 'sqlite'),
            'prefix' => app_env('SQLITE_PREFIX', '')
        ]
    ]
];
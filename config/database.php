<?php

return [
    /**
     * Fetch mode.
     */
    'fetch' => PDO::FETCH_OBJ,

    /**
     * The default connection point
     */
    'default' => app_env('DB_DEFAULT', 'mysql'),

    /**
     * The migration memory table
     */
    'migration' => 'bow_migration_status',

    /**
     * The database on which the default application will connect.
     *
     * The database by default, it is on this data base that will connects
     * automatically. So you absolutely must not edit the default key.
     *
     * In the opposite box you must execute the code in each route.
     * `db('the key name')` or `Bow\Database\Database::connection('the key name')`
     */
    'connection' => [
        /**
         * Connexion mysql
         */
        'mysql' => [
            'hostname' => app_env('MYSQL_HOSTNAME', 'localhost'),
            'username' => app_env('MYSQL_USERNAME', 'test'),
            'password' => app_env('MYSQL_PASSWORD', 'test'),
            'database' => app_env('MYSQL_DBNAME', 'test'),
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
            'database' => app_env('SQLITE_DATABASE', __DIR__.'/../var/database.sqlite'),
            'charset'  => app_env('SQLITE_CHARSET', 'utf8'),
            'prefix' => app_env('SQLITE_PREFIX', '')
        ]
    ]
];

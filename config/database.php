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
    'connections' => [
        /**
         * Connexion mysql
         */
        'mysql' => [
            'driver' => 'mysql',
            'hostname' => app_env('DB_HOSTNAME', 'localhost'),
            'username' => app_env('DB_USERNAME', 'test'),
            'password' => app_env('DB_PASSWORD', 'test'),
            'database' => app_env('DB_DBNAME', 'test'),
            'charset'  => app_env('DB_CHARSET', 'utf8mb4'),
            'collation' => app_env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'engine' => app_env('DB_ENGINE', 'InnoDB'),
            'prefix' => app_env('DB_PREFIX', ''),
            'port' => app_env('DB_PORT', 3306),
            'socket' => app_env('DB_SOCKET', null)
        ],

        /**
         * Connexion sqlite
         */
        'sqlite' => [
            'driver' => app_env('DB_DRIVER', 'sqlite'),
            'database' => app_env('DB_DATABASE', __DIR__ . '/../var/database.sqlite'),
            'charset'  => app_env('DB_CHARSET', 'utf8'),
            'prefix' => app_env('DB_PREFIX', ''),
            'foreign_key_constraints' => app_env('DB_FOREIGN_KEYS', true),
        ]
    ]
];

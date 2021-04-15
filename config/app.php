<?php

return [
    /**
     * Name of the Application
     */
    'name' => app_env('APP_NAME', 'Bow Application'),

    /**
     * Root of the application
     *
     * e.g '/app'
     */
    'root' => app_env('APP_URI_PREFIX', ''),

    /**
     * The local area
     */
    'timezone' => 'Africa/Abidjan',

    /**
     * The path to the root of the application
     */
    'env_file' => realpath(__DIR__.'/../.env.json'),

    /**
     * Path to the frontend folder
     */
    'frontend_path' => dirname(__DIR__).'/frontend',

    /**
     * Path to the seeders folder
     */
    'seeder_path' => dirname(__DIR__) . '/seeders',

    /**
     * Path to the public folder
     */
    'public_path' => dirname(__DIR__).'/public',

    /**
     * Path to the storage folder
     */
    'storage_path' => dirname(__DIR__).'/var/storage',

    /**
     * Path to the mix-manifest.json
     */
    'mixfile_path' => dirname(__DIR__).'/public/mix-manifest.json',

    /**
     * The debug mode of the application
     *
     * development | production
     */
    'debug' => app_env('APP_ENV', 'development'),

    /**
     * The app error handler
     */
    "error_handle" => \App\Exceptions\ErrorHandle::class,

    /**
     * Enable the error trace the method json is called
     */
    "error_trace" => true
];

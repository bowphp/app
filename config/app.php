<?php
/**
 * Configuration of the application
 *
 * We return the configuration that php will use for launch the initial configuration of vap
 */

return [
    /**
     * Name of the Application
     */
    'name' => 'Bow',

    /**
     * Root of the application
     *
     * e.g '/app'
     */
    'root' => '',

    /**
     * The local area
     */
    'timezone' => 'Africa/Abidjan',

    /**
     * The path to the root of the application
     */
    'envfile' => realpath(__DIR__.'/../.env.json'),

    /**
     * Path to the components folder
     */
    'component_path' => dirname(__DIR__).'/frontend',

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
    "error_handle" => \App\Exceptions\ErrorHandle::class
];

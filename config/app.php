<?php
/**
 * Configuration de l'application
 * On retourne la configuration que php utilisera pour
 * lancer la configuration initiale de vap
 */

return [
    /**
     * Nom de l'Application
     */
    'name' => 'Bow',

    /**
     * Racine de l'application
     * e.g '/app'
     */
    'root' => '',

    /**
     * La Zone local
     */
    'timezone' => 'Africa/Abidjan',

    /**
     * Le chemin vers la root de l'application
     */
    'envfile' => realpath(__DIR__.'/../.env.json'),

    /**
     * Chemin vers le dossier components
     */
    'component_path' => dirname(__DIR__).'/components',

    /**
     * Chemin vers le dossier public
     */
    'public_path' => dirname(__DIR__).'/public',

    /**
     * Chemin vers le dossier storage
     */
    'storage_path' => dirname(__DIR__).'/storage',

    /**
     * Chemin vers le mixfile-version.json
     */
    'mixfile_version_path' => dirname(__DIR__).'/.mixfile-version.json',

    /**
     * Le mode de débogage de l'application
     * development | production
     */
    'debug' => env('MODE', 'development')
];

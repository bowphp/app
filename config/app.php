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
    'name' => 'The Bow Framework',

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
     * Le chemin vers les fichiers statics
     */
    'public_path' => '/',

    /**
     * Chemin vers le dossier des fichiers statics
     */
    'assets_path' => __DIR__.'/../public',

    /**
     * Chemin vers le dossier des fichiers statics
     */
    'public_path' => __DIR__.'/../public',

    /**
     * Chemin vers le dossier des fichiers statics
     */
    'storage_path' => __DIR__.'/../storage',

    /**
     * Le mode de débogage de l'application
     * development | production
     */
    'debug' => env('MODE', 'development')
];

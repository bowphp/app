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
     * Le chemin vers les fichiers statics
     */
    'static' => '/',

    /**
     * Chemin vers le dossier des fichiers statics
     */
    'assets' => __DIR__.'/../public',

    /**
     * Le mode de débogage de l'application
     * development | production
     */
    'debug' => 'development',

    /**
     * Le chemin vers le fichier de configuration
     */
    'migration' => __DIR__.'/../db/migration',

    /**
     * Le chemin vers le fichier des seeders
     */
    'seeder' => __DIR__.'/../db/seeders'
];

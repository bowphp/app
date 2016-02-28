<?php

/*-------------------------------------------------------------
| Configuration de l'application
|--------------------------------------------------------------
|
| On retourne la configuration que l'application utilisera pour
| lancer la configuration initiale de l'application
|
*/

return (object) [
    // Nom de l'Application
	"app_name" => "The Bow Framework",
    // La local
	"timezone" => "Africa/Abidjan",
    // Niveau de log
	"log_level" => "dev",
    // Repertoire de log
    "log_direcotory_name" => dirname(__DIR__) . "/storage/logs",
    // En cas d'utilisation de token. Ceci est le temps de vie d'un token
	"tokenExpirateTime" => 50000,
    // chemin du fichier 404
	"not_found_file_name" => dirname(__DIR__) . "/app/views/404.php",
    // Template par defaut utiliser par Snoop. Le systeme implement 3 moteur de template
    // Valeur possible: twig, mustache, jade
  	"template" => "twig",
    // Le repertoire des vues
    "views" => dirname(__DIR__) . "/app/views",
    // Le repertoire de cache.
    "cacheFolder" => dirname(__DIR__) . "/storage/cache/template",
    // Liste des namespaces
    "names" => [
        "namespace" => [
            "controller" => "App\\Controller",
            "middleware" => "App\\Middleware",
            "autoload" => dirname(__DIR__) . "/app/autoload"
        ],
        // Liste de middleware
        "middleware" => ["auth"],
        "app_autoload" => "App\\Autoload"
    ],
    "type" => "dev",
    "cipher" => __DIR__ . "/.key"
];

// 44 23 89 69

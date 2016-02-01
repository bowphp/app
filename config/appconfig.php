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
	"appname" => "The Snoop Framework",
    // La local
	"timezone" => "Africa/Abidjan",
    // Niveau de log
	"loglevel" => "dev",
    // Repertoire de log
    "logDirecotoryName" => dirname(__DIR__) . "/logger",
    // En cas d'utilisation de token. Ceci est le temps de vie d'un token
	"tokenExpirateTime" => 50000,
    // chemin du fichier 404
	"notFoundFileName" => dirname(__DIR__) . "/resources/views/404.php",
    // Template par defaut utiliser par Snoop. Le systeme implement 3 moteur de template
    // Valeur possible: twig, mustache, jade
  	"template" => "twig",
    // Le repertoire des vues
    "views" => dirname(__DIR__) . "/resources/views",
    // Le repertoire de cache.
    "cacheFolder" => dirname(__DIR__) . "/resources/cache/template",
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
    "type" => "dev"
];

// 44 23 89 69
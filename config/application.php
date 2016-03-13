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

<<<<<<< HEAD
    // Racine de l'application
    "app_root" => "/app",

=======
>>>>>>> develop
    // La local
	"timezone" => "Africa/Abidjan",

    // Repertoire de log
    "log_direcotory_name" => dirname(__DIR__) . "/storage/logs",

    // En cas d'utilisation de token. Ceci est le temps de vie d'un token.
    // il est vivement conseil de programmer avec des tokens.
	"token_expirate_time" => 50000,

    // chemin du fichier 404
    // Quand une uri est invalide, alors Bow
    // chargera ce fichier.
	"not_found_file_name" => dirname(__DIR__) . "/app/views/404.php",

    // Template par defaut utiliser par Bow. Le systeme implement 3 moteur de template
    // Valeur possible: twig, mustache, jade
  	"template" => "twig",

    // Extension des pages de vues
    "template_extension" => ".php",

    // Le repertoire des vues. C'est dans ce repertoire que
    // vous allez mettre tous vos vues.
    // Les vues doivent avoir une instantion *.php
    "views" => dirname(__DIR__) . "/app/views",

    // Le repertoire de cache.
    // quand le cache sera remplit c'est à vous de le vidé
    "cache_folder" => dirname(__DIR__) . "/storage/cache",

    // Liste des *namespaces* valident de votre application
    // * concernant les middleware
    "classes" => [

        // Liste de namespace valide de l'application
        "namespace" => [
            "controller" => "App\\Controller",
            "middleware" => "App\\Middleware",
            "app"        => "App\\Autoload",
        ],

        // Liste de middleware
        // * ici quand vous générez un middleware
        // * il faudra l'enregistré dans ce tableau
        // e.g: ["Auth", "Other middleware name"]
        "middlewares" => ["Auth"],

        // autoload de l'application
        "autoload"    => dirname(__DIR__) . "/app/autoload"
    ],

    // Le mode de debugage de l'application
	// develope | production
    "debug"   => "develope",

	// clé de sécurité de l'application
	// Peut être régenerer par la commande
	// <code>: `php bow generate key` </code>
    "app_key" => __DIR__ . "/.key"
];

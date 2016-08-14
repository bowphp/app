<?php
/*-------------------------------------------------------------
| Configuration de l'application
|--------------------------------------------------------------
|
| On retourne la configuration que php utilisera pour
| lancer la configuration initiale de vap
|
*/

return (object) [

    // Nom de l'Application
    'app_name' => 'The Bow Framework',

    // Racine de l'application
    // e.g '/app'
    'app_root' => '',

    // La local
    'timezone' => 'Africa/Abidjan',

    // Repertoire de log
    'log_direcotory_name' => dirname(__DIR__) . '/storage/logs',

    // En cas d'utilisation de token. Ceci est le temps de vie d'un token.
    // il est vivement conseil de programmer avec des tokens.
    'token_expirate_time' => 50000,

    // chemin du fichier 404
    // Quand une uri est invalide, alors Bow
    // chargera ce fichier.
    'not_found_file_name' => dirname(__DIR__) . '/app/views/404.php',

    // Template par defaut utiliser par Bow. Le systeme implement 3 moteur de template
    // Valeur possible (supported): twig, mustache, jade, php
    // - Le nom du package mustache: mustache/mustache
    // - Le nom du package jade: kylekatarnls/jade-php
    'template_engine' => 'twig',

    // Extension des pages de vues
    'template_extension' => '.twig',

    // Le chemin vers les fichiers statics
    'static_files_directory' => '/',

    // Permet de dire à l'application si vous voulez en
    // première argumment des CLOSURES ou des methodes des controllers,
    // une instance de la classe Application, 'POUR DES PROBLEMES DE SCOPE'
    'instance_of_application_in_function' => false,

    // Le repertoire de cache.
    // quand le cache sera remplit c'est à vous de le vidé
    'template_cache_folder' => dirname(__DIR__) . '/storage/cache',

    // active le systeme réchargé de cache.
    // Quand la valeur est à true
    'template_auto_reload_cache_views' => true,

    // Le repertoire des vues. C'est dans ce repertoire que
    // vous allez mettre tous vos vues.
    // Les vues doivent avoir l' instantion que vous avez définir
    // dans 'template_extension' si non erreur sera lancé
    'views_path' => dirname(__DIR__) . '/app/Views',

    // Liste des **namespaces** valident de votre application
    // * concernant les middleware
    'classes' => require __DIR__.'/namespaces.php',

    // Le mode de débogage de l'application
    // development | production
    'debug'   => 'development',

    // clé de sécurité de l'application
    // Peut être régenerer par la commande
    // <code> `php bow generate:key` </code>
    'app_key' => __DIR__ . '/.key'
];

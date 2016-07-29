<?php
/**
 * Fichier de configuration de la classe réssource
 */
return (object) [
    // Store locatin
    "storage_directory" => __DIR__."/../storage/app",

    // FTP. configuration
    "ftp" => [
        "password" => "mot de passe ftp",
        "username" => "nom d'utilisateur ftp",
        "root" => "~",
        "tls" => false, // A `true` pour activer une connection sécurisé.
        "timeout" => 50 // Temps d'attente de connection
    ]
];

<?php
/**
 | Fichier de configuration de la classe réssource
 */
return [
    // Store location
    'storage' => __DIR__.'/../storage/app',

    // FTP. configuration
    'ftp' => [
        'hostname' => 'localhost',
        'password' => 'mot de passe ftp',
        'username' => 'nom d\'utilisateur ftp',
        'port'     => 21,
        'root' => null, // Le dossier de base du serveur
        'tls' => false, // A `true` pour activer une connection sécurisé.
        'timeout' => 50 // Temps d'attente de connection
    ]
];

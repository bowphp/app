<?php

/**
 * Fichier de configuration de la classe ressource
 */

return (object) [
    // Liste des extensions valides en cas d'upload de fichier
    "uploadFileExtension" => [ "jpg", "png", "jpeg", "ico", "git", "doc", "pdf" ],
    // Répertoire d'upload de fichier, Deux types sont valides
    // :folder|:ftp
    "uploadConfiguration" => (object) [
        "type" => "folder",
        "config" => [
            "folder" => [
                "dirname" => dirname(__DIR__) . "/public/upload"
            ],
            "ftp" => (object) [
                "password" => "mot de passe ftp",
                "username" => "nom d'utilisateur ftp",
                "root" => "~",
                "tls" => false, // A `true` pour activer une connection sécurisé.
                "timeout" => 50 // Temps d'attente de connection
            ]
        ]
    ]
];
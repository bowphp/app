<?php
/**
 * Fichier de chargement global de configuration de l'application
 */

return [
    'application' => require __DIR__ . '/application.php',
    'database'    => require __DIR__ . '/database.php',
    'mail'        => require __DIR__ . '/mail.php',
    'resource'    => require __DIR__ . '/resource.php'
];
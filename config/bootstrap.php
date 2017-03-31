<?php
/**
 | Fichier de chargement global de configuration de l'application
 */
\Bow\Application\Configuration::configure([
    'application' => require __DIR__ . '/application.php',
    'database'    => require __DIR__ . '/database.php',
    'mail'        => require __DIR__ . '/mail.php',
    'resource'    => require __DIR__ . '/resource.php'
]);

// Configuration de la Request et de la Response
\Bow\Http\Response::configure(config());
// Configuration du systeme de cache
\Bow\Http\Cache::confirgure(config('cache').'/bow');
// Configuration de la base de donnée
\Bow\Database\Database::configure(config('db'));
// Configuration de la resource de l'application.
\Bow\Resource\Storage::configure(config('ftp'));
// Configuration de Mail.
\Bow\Mail\Mail::configure(config('mail'));
// Configuration de la Sécurité
\Bow\Security\Security::setkey(config('key'));
// Initialisation du token
\Bow\Security\Security::createCsrfToken();
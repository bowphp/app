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

/**
 * Configuration de la Request et de la Response
 */
\Bow\Http\Response::configure(config('view path'));

/**
 * Configuration de Mail.
 */
\Bow\Mail\Mail::configure(config('mail'));

/**
 * Initialisation du token
 */
\Bow\Security\Security::createCsrfToken();

/**
 * Configuration de la Sécurité
 */
\Bow\Security\Security::setkey(config('key'));

/**
 * Configuration de la base de donnée
 */
\Bow\Database\Database::configure(config('db'));

/**
 * Configuration du systeme de cache
 */
\Bow\Http\Cache::confirgure(config('cache').'/bow');

/**
 * Configuration de la resource de l'application
 */
\Bow\Resource\Storage::configure(config('resource'));

/**
 * Configuration du charger de vue
 */
\Bow\View\View::configure(config());

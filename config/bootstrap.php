<?php
use \Bow\Mail\Mail;
use \Bow\View\View;
use \Bow\Http\Cache;
use \Bow\Resource\Storage;
use \Bow\Security\Security;
use \Bow\Database\Database;
use \Bow\Translate\Translator;
use \Bow\Application\Configuration;

/**
 * Fichier de chargement global de configuration de l'application
 */
$config = Configuration::configure(__DIR__.'/../');

/**
 * Configuration de Mail.
 */
Mail::configure($config['mail']);

/**
 * Initialisation du token
 * et Configuration de la Sécurité
 */
Security::setkey(
    $config['security.key'],
    $config['security.cipher']
);
Security::createCsrfToken();

/**
 * Configuration de la base de donnée
 */
Database::configure($config['db']);

/**
 * Configuration du systeme de cache
 */
Cache::confirgure($config['resource.cache'].'/bow');

/**
 * Configuration de la resource de l'application
 */
Storage::configure($config['resource']);

/**
 * Configuration du charger de vue
 */
View::configure($config);

/**
 * Configuration de translator
 */
Translator::configure(
    $config['trans.lang'],
    $config['trans.directory']
);
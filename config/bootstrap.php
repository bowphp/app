<?php
use \Bow\Application\Configuration;

/**
 | Fichier de chargement global de configuration de l'application
 */

$config = Configuration::configure([
	'envfile'	  => __DIR__.'/../.envfile.json',
	'app_base_dirname' => __DIR__.'/../'
]);

$config->setAllConfiguration([
	'application' => require __DIR__.'/application.php',
 	'database'    => require __DIR__.'/database.php',
	'mail'        => require __DIR__.'/mail.php',
	'resource'    => require __DIR__.'/resource.php'
]);

/**
 * Configuration de la Request et de la Response
 */
\Bow\Http\Response::configure($config->getViewpath());

/**
 * Configuration de Mail.
 */
\Bow\Mail\Mail::configure($config->getMailConfiguration());

/**
 * Initialisation du token
 */
\Bow\Security\Security::createCsrfToken();

/**
 * Configuration de la Sécurité
 */
\Bow\Security\Security::setkey($config->getAppkey());

/**
 * Configuration de la base de donnée
 */
\Bow\Database\Database::configure($config->getDatabaseConfiguration());

/**
 * Configuration du systeme de cache
 */
\Bow\Http\Cache::confirgure($config->getCachepath().'/bow');

/**
 * Configuration de la resource de l'application
 */
\Bow\Resource\Storage::configure($config->getResourceConfiguration());

/**
 * Configuration du charger de vue
 */
\Bow\View\View::configure($config);

/**
 * Configuration de translator
 */
\Bow\Translate\Translator::configure($config->getDefaultLang(), $config->getTranslateDirectory());
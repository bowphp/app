<?php
/**
 * Load application configurations
 */
require __DIR__."/../vendor/autoload.php";

/**
 * Create kernel instance
 */
$kernel = \App\Kernel\Loader::configure(realpath(__DIR__.'/../config'));

/**
 * Création de l'application
 */
$app = Bow\Application\Application::make(
    new \Bow\Http\Request, new \Bow\Http\Response
);

/**
 * Bind kernel to application
 */
$app->bind($kernel);

/**
 * Load application routing
 */
require __DIR__ . "/../routes/app.php";

/**
 * Send application response
 */
$app->send();
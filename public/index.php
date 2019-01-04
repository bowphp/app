<?php
/**
 * Load application configurations
 */
require __DIR__."/../vendor/autoload.php";

/**
 * Create kernel instance
 */
$kernel = \App\Kernel::configure(realpath(__DIR__.'/../config'));

/**
 * Creation of application
 */
$app = Bow\Application\Application::make(
    \Bow\Http\Request::getInstance(), \Bow\Http\Response::getInstance()
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

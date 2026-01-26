<?php

use App\Kernel;
use Bow\Application\Application;
use Bow\Http\Request;
use Bow\Http\Response;

// Register The Auto Loader
if (!file_exists(__DIR__ . "/../vendor/autoload.php")) {
    die("Please install the dependencies with 'composer update'");
}

if (file_exists(__DIR__ . '/../var/storage/maintenance.php')) {
    require __DIR__ . '/../var/storage/maintenance.php';
}

require __DIR__."/../vendor/autoload.php";

$app = Application::make(Request::getInstance(), Response::getInstance());

// Bind kernel to application
$app->bind(
    Kernel::configure(dirname(__DIR__))->withConfigPath(dirname(__DIR__) . '/config')
);

// Run The Application
$app->run();

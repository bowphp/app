<?php

use App\Kernel;
use Bow\Application\Application;
use Bow\Http\Request;
use Bow\Http\Response;

// Register The Auto Loader
if (!file_exists(__DIR__."/../vendor/autoload.php")) {
	die("Please install the depencencies with 'composer update'");
}

require __DIR__."/../vendor/autoload.php";

// Create kernel instance
$kernel = Kernel::configure(realpath(__DIR__.'/../config'));

// Creation of application
$app = Application::make(Request::getInstance(), Response::getInstance());

// Bind kernel to application
$app->bind($kernel);

// Load application routing
require __DIR__ . "/../routes/app.php";

// Run The Application
$app->send();

<?php

// -----------------------------------------------------------------
// Chargement des configurations
// -----------------------------------------------------------------
// Chargement des principaux fichier de l'application
// -----------------------------------------------------------------

require dirname(__DIR__) . "/vendor/autoload.php";
$config = require dirname(__DIR__) . "/config/bootstrap.php";

// Creation de l'application
$app = Bow\Core\Application::configure($config->appconfig);

require "Http/Router/routes.php";

// Lancement de l'application
$app->run();

return [
	"app" => $app,
	"config" => $config
];

<?php

// -----------------------------------------------------------------
// Chargement des configurations
// -----------------------------------------------------------------
// Chargement principaux de l'application

require dirname(__DIR__) . "/vendor/autoload.php";

$config = require dirname(__DIR__) . "/configuration/bootstrap.php";

// Creation de l'application
$app = \System\Core\Application::loader($config->init);

$app->set("engine", "mustache");

require "Http/Router/index.php";

// Lancement de l'application
$app->run();

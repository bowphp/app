<?php

// -----------------------------------------------------------------
// Chargement des configurations
// -----------------------------------------------------------------
// Chargement principaux de l'application

$config = require dirname(__DIR__) . "/configuration/bootstrap.php";

use System\Database\DB;
use System\Core\Application;
use System\ApplicationAutoload;

ApplicationAutoload::register();




// Creation de l'application
$app = Application::loader($config->init);
DB::loadConfiguration($config->db);
Logger::loadConfiguration($config->init);

require dirname(__DIR__) . "/vendor/papac/snoopframework/src/Support/Helper.php";


require "Http/Router/index.php";

// Lancement de l'application
$app->run();

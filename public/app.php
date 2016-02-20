<?php

/*-------------------------------------------------------
|
|	Chargement des configurations
|	Chargement des principaux fichier de l'application
|
*/
require_once dirname(__DIR__) . "/vendor/autoload.php";

// Creation de l'application
$app = Bow\Core\Application::configure(configuration());

// Chargement des routeurs.
require dirname(__DIR__) . "/app/Router/routes.php";

// Lancement de l'application
$app->run();
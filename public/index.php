<?php
/**
 * chargement des configurations
 * chargement des principaux fichiers de l'application bow
 */
require __DIR__."/../vendor/autoload.php";

use \Bow\Http\Request;
use \Bow\Http\Response;

$kernel = new \App\Kernel\Loader(
    realpath(__DIR__.'/../config')
);

// Création de l'application
$app = Bow\Application\Application::make(
	new Request, 
	new Response
);

$app->bind($kernel);

// Chargement des routeurs.
require __DIR__ . "/../routes/main.php";

// Lancement de l'application
$app->send();

return $app;
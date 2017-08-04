<?php
/**
 | chargement des configurations
 | chargement des principaux fichiers de l'application bow
 */
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../config/bootstrap.php";

use Bow\Application\Application;

// Création de l'application
$app = Application::make(config(), request(), response());

// Chargement des routeurs.
require __DIR__ . "/../routes/main.php";

// Lancement de l'application
$app->run();

return $app;
<?php
/**
 | chargement des configurations
 | chargement des principaux fichiers de l'application bow
 */
require __DIR__."/../vendor/autoload.php";

$kernel = new \App\Kernel\Loader(__DIR__.'/../config');

// Création de l'application
$app = Bow\Application\Application::make(new \Bow\Http\Request(), new \Bow\Http\Response());

$app->bind($kernel);

// Chargement des routeurs.
require __DIR__ . "/../routes/main.php";

// Lancement de l'application
$app->send();

return $app;
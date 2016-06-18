<?php
/*
|-------------------------------------------------------
|	CHARGEMENT DES CONFIGURATIONS
|	CHARGEMENT DES PRINCIPAUX FICHIERS DE L'APPLICATION BOW
*/
require_once dirname(__DIR__) . "/vendor/autoload.php";

// Création de l'application
$app = Bow\Core\Application::configure(config());

// Chargement des routeurs.
require dirname(__DIR__) . "/app/Router/routes.php";

// Lancement de l'application
$app->run();
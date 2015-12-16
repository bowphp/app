<?php

// -----------------------------------------------------------------
// Chargement des configurations
// -----------------------------------------------------------------
// Chargement principaux de l'application

require dirname(__DIR__) . "/configuration/bootstrap.php";

use System\Core\Snoop;
use System\Database\DB;
use System\SnoopAutoload;



SnoopAutoload::register();
// Creation de l'application

$app = Snoop::loader($init);
$app->set("root", "/Php/Snoop");


// Inclusion du point d'entrer du systeme de routing
function db() {
	return DB::class;
}

require "Http/Router/index.php";


$app->run();

<?php
require dirname(__DIR__) . "/configuration/bootstrap.php";
require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/src/Core/SnoopAutoload.php";

use System\Core\Snoop;
use System\Core\SnoopAutoload;

SnoopAutoload::register();

$app = Snoop::loader($init);
$app->set("root", "/Php/Snoop");

require "Http/Router/index.php";


$app->run();

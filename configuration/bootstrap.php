<?php

require dirname(__DIR__) . "/snoopframework/src/SnoopAutoload.php";
require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/app/autoload.php";

$mail = require "mail.php";
$db = require "db.php";
$init = require "init.php";

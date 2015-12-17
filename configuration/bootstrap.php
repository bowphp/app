<?php

require dirname(__DIR__) . "/vendor/autoload.php";

return  (object) [
    "mail" => require "mail.php",
    "db" => require "db.php",
    "init" => require "init.php"
];

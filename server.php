<?php

$stderr = fopen("php://stderr", "w");

if ($stderr) {
    $access = sprintf("[%s] - \033[0;32m%s\033[00m \033[0;34m%s\033[00m\n", date("d-m-Y H:i:s", $_SERVER["REQUEST_TIME"]), $_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
    fwrite($stderr, $access);
}

fclose($stderr);

require "public/index.php";

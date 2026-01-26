<?php

// Register The Auto Loader
if (!file_exists(__DIR__ . "/../vendor/autoload.php")) {
    die("Please install the dependencies with 'composer update'");
}

require __DIR__ . "/../vendor/autoload.php";

// boot kernel
$kernel = App\Kernel::configure(realpath(dirname(__DIR__)));
$kernel->boot();

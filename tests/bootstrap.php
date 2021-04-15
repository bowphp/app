<?php

// Register The Auto Loader
if (!file_exists(__DIR__."/../vendor/autoload.php")) {
	die("Please install the depencencies with 'composer update'");
}

require __DIR__."/../vendor/autoload.php";

// boot kernel
$kernel = App\Kernel::configure(realpath(__DIR__.'/../config'));
$kernel->boot();

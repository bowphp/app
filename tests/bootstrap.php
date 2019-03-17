<?php
require __DIR__."/../vendor/autoload.php";

/**
 * Boot kernel
 */
$kernel = \App\Kernel::configure(realpath(__DIR__.'/../config'));
$kernel->boot();
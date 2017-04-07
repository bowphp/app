<?php
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../config/bootstrap.php';

use \Bow\Database\Database;

$seeds_filenames = glob(__DIR__.'/*_seed.php');
$seed_collection = [];

foreach ($seeds_filenames as $filename) {
    $seed_collection = array_merge(require $filename, $seed_collection);
}

foreach ($seed_collection as $table => $seed) {
    $n = Database::table($table)->insert($seed);
    echo "'$n' seed(s) for '$table'\n";
}

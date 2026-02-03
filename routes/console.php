<?php

use Bow\Console\Color;
use Bow\Console\Argument;

$console->addCommand('hello', function (Argument $argument) {
    $index = route('app.index');
    echo Color::green("hello, bow task runner.");
});

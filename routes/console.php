<?php

use Bow\Console\Color;
use Bow\Console\Argument;

$console->addCommand('hello', function (Argument $argument) {
    echo Color::green("hello, bow task runner.");
});

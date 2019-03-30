<?php
/**
 * Put here your custom console command.
 */
use Bow\Console\Color;
use Bow\Console\ArgOption as Argument;

$console->addCommand('hello', function (Argument $argument) {
    echo Color::green("hello, bow task runner.");
});

<?php

use Bow\Console\Color;
use Bow\Console\Argument;
use App\Commands\TestCommand;

$console->addCommand('hello', function (Argument $argument) {
    $index = route('app.index');
    echo Color::green("hello, bow task runner.");
});

$console->addCommand('test:hello', TestCommand::class);

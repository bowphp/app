<?php

use App\Controllers\WelcomeController;

$app->get('/', WelcomeController::class)->name('app.index');
$app->rest('/cast', WelcomeController::class)->name('app.index');

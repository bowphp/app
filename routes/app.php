<?php

use App\Controllers\WelcomeController;

$app->get('/', WelcomeController::class)->name('app.index');

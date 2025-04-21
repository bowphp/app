<?php

use App\Controllers\WelcomeController;

$router->get('/', WelcomeController::class)->name('app.index');

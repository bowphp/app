<?php

/**
 * Just tell Bow which URIs he should answer and give him the
 * controller to call when this URL is requested.
 * Follow the following example, it gives you an overview on how it works in general.
 */
$app->get('/', 'WelcomeController')->middleware('auth');
$app->get('/login', 'WelcomeController')->middleware('guest');

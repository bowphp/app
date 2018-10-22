<?php

$app->route([
	'path' => '/',
	'method' => 'GET',
	'handler' => function () {
		return response()->render('welcome');
	}
]);

$app->route([
	'path' => '/hello/:name',
	'method' => 'GET',
	'handler' => 'HomeController::index',
	'where' => ['name' => '[a-z]+']
]);



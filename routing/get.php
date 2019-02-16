<?php

$app->route([
	'path' => '/',
	'method' => 'GET',
	'handler' => function () {
		return response()->render('welcome');
	}
]);


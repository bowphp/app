<?php

$app->get('/user', function($request, $response) use ($app) {

	return $response->render("Wellcome");
	// or view("Wellcome");

});
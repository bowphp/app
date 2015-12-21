<?php

$app->get("/", function($req, $res) {

	$res->render("welcome");

});
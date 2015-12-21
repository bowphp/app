<?php

$app->get("/:id", function($req) {

	echo "Hello world " . $req->params->id;

})->where(["id" => "[a-zA-Z]+"]);
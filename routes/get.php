<?php

use Bow\Http\Request;
use App\User;

$app->get("/", function (Request $request, User $user) {

	debug($request->get('name'), $user->toSql());

    return view("welcome");
});

$app->get("/hello/:name", function ($name) {
    return sprintf("Bonjour <b>%s</b>", $name);
});

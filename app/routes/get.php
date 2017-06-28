<?php

$app->get("/", function() {
    debug(\App\User::all());
    return view("welcome");
});

$app->get("/name", function() {
    return 'name';
});
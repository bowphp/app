<?php

$app->get("/", function() {
    debug(\App\User::all());
    return view("welcome");
});
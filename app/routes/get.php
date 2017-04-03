<?php

$app->get("/", function() {
    return view("welcome");
});

$app->get('/json', 'UsersController@index');
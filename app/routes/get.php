<?php

$app->get("/", function() {
    return view("welcome");
});

$app->get('/users', 'UsersController@index');
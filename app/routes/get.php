<?php

$app->get("/", function() {
    return view("welcome");
});

$app->get('/test/:name', 'UserController@index');
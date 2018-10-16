<?php

$app->get("/", function () {
    return response()->render("welcome");
});

$app->get('/index', 'HomeController::index');

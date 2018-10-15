<?php

$app->get("/", function () {
    return response()->render("welcome");
});

$app->get('/index', ['action' => 'HomeController::index']);
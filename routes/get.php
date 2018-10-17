<?php

$app->get("/", function () {
    return response()->render("welcome");
});

$app->get('/hello/:name', 'HomeController::index');

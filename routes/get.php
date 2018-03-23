<?php

$app->get("/", function () {
    return view("welcome");
});

$app->get("/hello/:name", function ($name) {
    return sprintf("Bonjour <b>%s</b>", $name);
});
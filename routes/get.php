<?php

$app->get("/", function () {
    return response()->render("welcome");
});
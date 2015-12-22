<?php


$app->get("/", "UserController.index");

$app->get("/users", "UserController.get");

$app->get("/users/add", "UserController.addUser");

$app->post("/users/posts", "UserController.create");

$app->get("/users/:id", "UserController.get")
    ->where(["id" => "\d+"]);


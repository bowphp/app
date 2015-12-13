<?php


$app->get('/user', function($req, $res) {
    echo "Hello";
});

$app->get('/user/:id', function($req, $res, $id) {

});

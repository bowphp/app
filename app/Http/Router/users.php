<?php

$app->get('/user', function($request, $response) use ($app) {



});

$app->get('/user/:id', ["middleware" => "UserController#show", "next" => function($id) {

    

}]);

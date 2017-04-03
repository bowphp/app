<?php
/**
 | Le code ci-dessous sera un jeu middleware qui vous permet de mettre en place un firewall
 | simple et robuste
 */

use \Bow\Application\Actionner;

if (request()->isPost() || request()->isPut()) {
    $middleware = [
        'middleware' => ['csrf']
    ];
    Actionner::call($middleware, request()->getParameters(), config()->getNamespace());
}

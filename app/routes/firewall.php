<?php
/**
 | Le code ci-dessous sera un jeu de firwall
 | simple et robuste
 */

use \Bow\Application\Actionner;

if (request()->isPost() || request()->isPut()) {
    $middleware = [
        'firewall' => ['csrf']
    ];
    Actionner::call($middleware, request()->getParameters(), config()->getNamespace());
}

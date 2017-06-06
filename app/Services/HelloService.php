<?php

namespace App\Services;

use \Bow\Application\Services;
use Bow\Application\Configuration;

class HelloService extends Services
{
    /**
     * Démarre le serivce
     */
    public function start()
    {
        echo 'stared';
    }

    /**
     * @param Configuration $config
     */
    public function make($config)
    {
        die('maked');
    }
}
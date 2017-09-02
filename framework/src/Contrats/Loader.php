<?php

namespace App\Contrats;

use \Bow\Mail\Mail;
use Bow\Support\DateAccess;
use \Bow\View\View;
use \Bow\Http\Cache;
use \Bow\Security\Crypto;
use \Bow\Resource\Storage;
use \Bow\Database\Database;
use \Bow\Translate\Translator;
use \Bow\Application\Configuration;

interface Loader
{
    /**
     * Get app namespace
     *
     * @return array
     */
    public function namespaces();

    /**
     * @return array
     */
    public function middlewares();

    /**
     * @return array
     */
    public function services();

    /**
     * Load configuration
     *
     * @return Configuration
     */
    public function configurations();
}
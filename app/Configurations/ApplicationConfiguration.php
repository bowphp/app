<?php

namespace App\Configurations;

use Bow\Configuration\Loader;
use Bow\Configuration\Configuration;

class ApplicationConfiguration extends Configuration
{
    /**
     * Launch configuration
     *
     * @param Loader $config
     * @return void
     */
    public function create(Loader $config): void
    {
        // Event::on("user.created", UserCreatedListener::class);
    }

    /**
     * Start the configured package
     *
     * @return void
     */
    public function run(): void
    {
        //
    }
}

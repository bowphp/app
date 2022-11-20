<?php

return [
    /**
     * The views directory. It is in this repertory that you will put all your views.
     * The views must have the instantion you have defined in 'template_extension'
     * if no error will be launched
     */
    'path' => __DIR__ . '/../templates',

    /**
     * The rendering engine of the views.
     *
     * Default template use by Bow.
     * The system implement 4 template engine.
     *
     * Template supported twig, php, tintin
     * Define the template name.
     * Example: define twig with package twig/twig for define twig template
     * Bow Framework support actualy twig, tintin, php
     */
    'engine' => 'tintin',

    /**
     * Extending view pages
     */
    'extension' => '.tintin.php',

    /**
     * The cache directory.
     *
     * When the cache is filled it's up to you to empty it
     */
    'cache' => __DIR__ . '/../var/view',

    /**
     * Additional option
     */
    'aditionnal_options' => [
        // 'auto_reload_cache' => true
    ]
];

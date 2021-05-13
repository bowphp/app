<?php

return [
    /**
     * The defaut connexion
     */
    "default" => "beanstalkd",

    /**
     * The queue drive connection
     */
    "connections" => [
        /**
         * The beanstalkd connexion
         */
        "beanstalkd" => [
            "hostname" => "127.0.0.0",
            "port" => 11300,
            "timeout" => 10,
        ],
    ]
];

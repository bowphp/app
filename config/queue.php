<?php

return [
    /**
     * The defaut connexion
     */
    "default" => "sync",

    /**
     * The queue drive connection
     */
    "connections" => [
        /**
         * The sync connexion
         */
        "sync" => [
            "driver" => "sync",
        ],

        /**
         * The beanstalkd connexion
         */
        "beanstalkd" => [
            "hostname" => "127.0.0.0",
            "queue" => "default",
            "port" => 11300,
            "timeout" => 10,
        ],

        /**
         * The sqs connexion
         */
        "sqs" => [
            "queue" => "default",
            "url" => app_env("SQS_URL"),
            'region' => app_env('AWS_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key'    => app_env('AWS_KEY'),
                'secret' => app_env('AWS_SECRET'),
            ],
        ],

        /**
         * The database connexion
         */
        "database" => [
            "queue" => "default",
            "table" => "queues",
        ]
    ]
];

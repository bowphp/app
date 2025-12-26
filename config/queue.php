<?php

return [
    /**
     * The default connexion
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
            "queue" => "default",
        ],

        /**
         * The beanstalkd connexion
         */
        "beanstalkd" => [
            "hostname" => "127.0.0.1",
            "port" => 11300,
            "timeout" => 10,
            "queue" => "default",
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

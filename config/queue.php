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
         * The rabbitmq connection
         */
        'rabbitmq' => [
            'queue' => 'default',
            'host' => app_env('RABBITMQ_HOST', '127.0.0.1'),
            'port' => app_env('RABBITMQ_PORT', 5672),
            'user' => app_env('RABBITMQ_USER', 'guest'),
            'password' => app_env('RABBITMQ_PASSWORD', 'guest'),
            'vhost' => app_env('RABBITMQ_VHOST', '/'),
        ],

        /**
         * The kafka connection
         */
        "kafka" => [
            'host' => 'localhost',
            'port' => 9092,
            'topic' => 'default',
            'group_id' => 'bow_queue_group',
            'auto_offset_reset' => 'earliest',
            'enable_auto_commit' => 'true',
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
        ],

        /**
         * The redis connexion
         */
        "redis" => [
            "queue" => "default",
            "block_timeout" => 5,
        ],
    ]
];

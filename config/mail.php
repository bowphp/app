<?php

return [
    /**
     * The type of service to use for sending mail
     * If smtp is set then the password and username keys must have values.
     *
     * driver name: mail, smtp
     */
    "driver" => app_env("MAIL_DRIVER", "smtp"),

    /**
     * MAIL Encoding
     */
    "charset"  => "utf8",

    /**
     * The email send ID
     */
    "from" => "sender@example.com",

    /**
     * SMTP authentication
     */
    "smtp" => [
        "hostname" => app_env("SMTP_HOSTNAME"),
        "username" => app_env("SMTP_USERNAME"),
        "password" => app_env("SMTP_PASSWORD"),
        "port"     => app_env("SMTP_PORT"),
        "tls"      => app_env("SMTP_TLS"),
        "ssl"      => app_env("SMTP_SSL"),
        "timeout"  => app_env("SMTP_TIMEOUT"),

        /**
         * DKIM (DomainKeys Identified Mail) allows an organization to take
         * responsibility for a message by signing it. It allows the receiver
         * to verify that the message was not modified in transit.
         */
        'dkim' => [
            'enabled' => app_env('MAIL_DKIM_ENABLED', false),
            'domain' => app_env('MAIL_DKIM_DOMAIN'),
            'selector' => app_env('MAIL_DKIM_SELECTOR', 'default'),
            'private_key' => app_env('MAIL_DKIM_PRIVATE_KEY'),
            'passphrase' => app_env('MAIL_DKIM_PASSPHRASE'),
            'identity' => app_env('MAIL_DKIM_IDENTITY'),
            'algo' => 'rsa-sha256',
        ],

        /**
         * SPF (Sender Policy Framework) is an email authentication method designed
         * to prevent email spoofing by allowing domain owners to specify which
         * mail servers are authorized to send mail for their domains.
         */
        'spf' => [
            'enabled' => app_env('MAIL_SPF_ENABLED', false),
            'strict' => app_env('MAIL_SPF_STRICT', true),
            'policies' => [
                'fail' => 'reject',     // reject, mark, accept
                'softfail' => 'mark',
                'neutral' => 'accept',
            ],
        ],
    ],

    /**
     * SMTP authentication
     */
    "ses" => [
        "profile" => app_env("SES_PROFILE", "default"),
        "version" => app_env("SES_VERSION", "2010-12-01"),
        "region" => app_env("SES_REGION", "us-west-2"),
        "credentials" => [
            "username" => "",
            "secret" => "",
        ],
        "config_set" => false,
    ],

    /**
     * MAIL authentication
     */
    "mail" => [
        "default" => "contact",
        "from" => [
            "contact" => [
                "address" => app_env("MAIL_FROM_EMAIL"),
                "name" => app_env("MAIL_FROM_NAME")
            ],
            "info" => [
                "address" => "info@exemple.com",
                "username" => "Address information"
            ]
        ]
    ],

    /**
     * Log driver configuration
     */
    "log" => [
        "path" => sys_get_temp_dir() . '/bow/mails',
    ],
];

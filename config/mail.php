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
     * SMTP authentification
     */
    "smtp" => [
        "hostname" => app_env("SMTP_HOSTNAME"),
        "username" => app_env("SMTP_USERNAME"),
        "password" => app_env("SMTP_PASSWORD"),
        "port"     => app_env("SMTP_PORT"),
        "tls"      => app_env("SMTP_TLS"),
        "ssl"      => app_env("SMTP_SSL"),
        "timeout"  => app_env("SMTP_TIMEOUT")
    ],

    /**
     * SMTP authentification
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
        "froms" => [
            "contact" => [
                "address" => app_env("MAIL_FROM_EMAIL"),
                "name" => app_env("MAIL_FROM_NAME")
            ],
            "info" => [
                "address" => "info@exemple.com",
                "username" => "Address information"
            ]
        ]
    ]
];

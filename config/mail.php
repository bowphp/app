<?php

return [
    /**
     * The type of service to use for sending mail
     * If smtp is set then the password and username keys must have values.
     *
     * driver name: mail, smtp
     */
    'driver' => app_env('MAIL_DRIVER', 'smtp'),

    /**
     * MAIL Encoding
     */
    'charset'  => 'utf8',

    /**
     * SMTP authentification
     */
    'smtp' => [
        'hostname' => app_env('SMTP_HOSTNAME'),
        'username' => app_env('SMTP_USERNAME'),
        'password' => app_env('SMTP_PASSWORD'),
        'port'     => app_env('SMTP_PORT'),
        'tls'      => app_env('SMTP_TLS'),
        'ssl'      => app_env('SMTP_SSL'),
        'timeout'  => app_env('SMTP_TIMEOUT')
    ],

    /**
     * MAIL authentication
     */
    'mail' => [
        'default' => 'contact',
        'contact' => [
            'address' => app_env('CONTACT_EMAIL'),
            'username' => app_env('CONTACT_NAME')
        ],
        'info' => [
            'address' => 'info@exemple.com',
            'username' => 'Address d\'Information'
        ]
    ]
];

<?php
/**
 * Configuration du service de mail
 *
 * On retourne la configuration
 * que l'application utilisera pour
 * Gérer l'envoye de mail.
 */
return [
    /**
     * Le type de service utiliser pour l'envoye de mail
     * supporté: mail, smtp
     * Si smtp est définie alors les clés password et username doivent avoir des values.
     */
    'driver' => app_env('MAIL_DRIVER', 'smtp'),

    /**
     * Encodage
     */
    'charset'  => 'utf8',

    /**
     * smtp authentification
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
     * mail authentification
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

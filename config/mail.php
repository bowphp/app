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
    'driver' => 'smtp',

    /**
     * Encodage
     */
    'charset'  => 'utf8',

    /**
     * smtp authentification
     */
    'smtp' => [
        'hostname' => env('SMTP_HOSTNAME'),
        'username' => env('SMTP_USERNAME'),
        'password' => env('SMTP_PASSWORD'),
        'port'     => env('SMTP_PORT'),
        'tls'      => env('SMTP_TLS'),
        'ssl'      => env('SMTP_SSL'),
        'timeout'  => env('SMTP_TIMEOUT')
    ],

    /**
     * mail authentification
     */
    'mail' => [
        'default' => 'contact',
        'contact' => [
            'address' => env('CONTACT_EMAIL'),
            'username' => env('CONTACT_NAME')
        ],
        'info' => [
            'address' => 'info@exemple.com',
            'username' => 'Address d\'Information'
        ]
    ]
];

<?php
/**
| Configuration du service de mail
|
| On retourne la configuration
| que l'application utilisera pour
| Gérer l'envoye de mail.
*/
return [
    // Le type de service utiliser pour l'envoye de mail
    // supporté: mail, smtp
    // Si smtp est définie alors les clés password et username doivent avoir des values.
    'driver' => 'smtp',

    // encodage
    'charset'  => 'utf8',

    // smtp authentification
    'smtp' => [
        'hostname' => 'hostname',
        'username' => 'username',
        'password' => 'password',
        'port'     => 25,
        'tls'      => false,
        'ssl'      => false,
        'timeout'  => 50,
    ],

    // mail authentification
    'mail' => [
        'default' => 'contact',
        'contact' => [
            'address' => 'concat@exemple.com',
            'username' => 'Address de contact'
        ],
        'info' => [
            'address' => 'info@exemple.com',
            'username' => 'Address d\'Information'
        ]
    ]
];

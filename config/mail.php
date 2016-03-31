<?php

/*----------------------------------
| Configuration du service de mail
|-----------------------------------
| On retourne la configuration
| que l'application utilisera pour
| Gérer l'envoye de mail.
*/
return (object) [
    // Le type de service utiliser pour l'envoye de mail
    // mail ou smtp
    // Si smtp est définie alors les clés password et username doivent avoir des values.
    "driver" => "smtp",

    // encodage
    "charset"  => "utf8",

    // mail authentification
    "smtp" => [
        "hostname" => "smpt.exemple.com",
        "username" => "johon",
        "password" => "your password",
        "tls"      => true,
        "timeout"  => 50
    ],

    // mail authentification
    "mail" => [
        "concat" => [
            "address" => "concat@exemple.com",
            "username" => "Address de contact"
        ],
        "info" => [
            "address" => "info@exemple.com",
            "username" => "Address d'Information"
        ]
    ]
];

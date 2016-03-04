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
    "driver" => "mail",

    // mail authantification
    "mail" => (object) [
        "username" => "johon@gmail.com",
        "password" => "your password",
        "tls" => true,
        "timeout" => 50
    ]
];

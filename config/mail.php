<?php

/*----------------------------------
| Configuration du service de mail
|-----------------------------------
| On retourne la configuration
| que l'application utilisera pour
| Gerer l'envoye de mail.
*/
return (object) [
    // Le type de service utiliser pour l'envoye de mail
    // php-mail or smtp
    // Si smtp est definie alors les cles password et username doivent avoir des values.
    "type" => "php-mail",
    "email" => (object) [
        "username" => "johon@gmail.com",
        "password" => "your password",
        "tls" => true,
        "timeout" => 50
    ]
];

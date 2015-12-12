<?php

/*--------------------------------
| Configuration de la base donnee.
|---------------------------------
| On retourne la configuration
| des bases de donnees utilise par
| l'application.
*/
return [
    // La base de donnee sur laquelle se connectera l'application
    // par defaut
    "default" => [
        "scheme" => "mysql",
        "host" => "localhost",
        "user" => "test",
        "pass" => "papac1010",
        "dbname" => "test",
        "port" => "",
        "socket" => "path to socket"
    ],
    "other" => [
        "scheme" => "mysql",
        "host" => "localhost",
        "user" => "user name",
        "pass" => "passe word",
        "dbname" => "data base name",
        "port" => "sgbd port",
        "socket" => "path to socket"
    ]
];

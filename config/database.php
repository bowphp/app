<?php

/*------------------------------------------------
| Configuration de la base donnée.
|-------------------------------------------------
| On retourne la configuration
| des bases de données utilisées par l'application.
| support mysql
*/
return (object) [

    // Fetch mode.
    "fetch" => PDO::FETCH_OBJ,

    // La base de donnée sur laquelle se connectera l'application
    // par défaut
    "connections" =>
    [
        // la base de donnee par defaut.
        // c'est sur cette base de donnee que bow va
        // se connecte automatique. Alors vous devez absolument
        // pas modifier la cle 'default'
        "default" => [
            "scheme" => "mysql",
            "mysql" =>
            [
                "hostname" => "localhost",
                "username" => "user name",
                "password" => "user password",
                "database" => "database name",
                "charset"  => "utf8",
                "collation" => "utf8_unicode_ci",
                "port" => null,
                "socket" => null
            ],
            "sqlite" => [
                "driver" => "sqlite",
                "database" => "database/sqlite",
                "prefix" => ""
            ]
        ],

        // La definition d'une autre base de donnee.
        "other" => [
            "scheme" => "mysql",
            "mysql" =>
            [
                "hostname" => "hoastname",
                "username" => "username",
                "password" => "password",
                "database" => "database name",
                "charset"  => "utf8",
                "collation" => "utf8_unicode_ci",
                "port" => null,
                "socket" => null
            ],
            "sqlite" => [
                "driver" => "sqlite",
                "database" => "database/sqlite",
                "prefix" => ""
            ]
        ]
    ]
];

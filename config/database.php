<?php

/*------------------------------------------------
| Configuration de la base donnee.
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
        "default" => [
            "scheme" => "mysql",
            "mysql" =>
            [
                "hostname" => "localhost",
                "username" => "user name",
                "password" => "user password",
                "database" => "database name",
                "charset" => "utf8",
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
        "produits" => [
            "scheme" => "mysql",
            "mysql" =>
            [
                "hostname" => "hoastname",
                "username" => "username",
                "password" => "password",
                "database" => "database name",
                "charset" => "utf8",
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

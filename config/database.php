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

    // La base séléctionné par defaut
    "default" => "first",

    // La base de donnée sur laquelle se connectera l'application
    // par défaut
    "connections" =>
    [
        // la base de donnée par defaut, c'est sur cette base de donnée que vap va
        // se connecte automatique. Alors vous ne devez absolument
        // pas modifier la cle 'default'.
        // Dans le case contraire vous devez executer le code
        // dans chaque route.
        // `db("le nom de cle")` or
        // `Bow\Database\Database::connection("le nom de la clé")`
        "first" => [
            // represente sur quel SGDB le site va se connecté.
            "scheme" => "mysql",

            // la configuration de mysql
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
        "seconds" => [
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

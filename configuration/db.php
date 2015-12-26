<?php

/*------------------------------------------------
| Configuration de la base donnee.
|-------------------------------------------------
| On retourne la configuration
| des bases de données utilisées par l'application.
*/
return (object) [
    // Fetch mode.
    "fetch" => PDO::FETCH_OBJ,
    // La base de donnee sur laquelle se connectera l'application
    // par defaut
    "connections" =>
    [
        "default" => [
            "scheme" => "mysql",
            "host" => "localhost",
            "user" => "test",
            "pass" => "test",
            "dbname" => "test",
            "port" => "",
            "socket" => ""
        ],
        "produits" => [
            "scheme" => "mysql|sqlite",
            "host" => "hoastname",
            "user" => "username",
            "pass" => "password",
            "dbname" => "database name",
            "port" => "",
            "socket" => ""
        ]
    ]
];

<?php

/*------------------------------------------------
| 
|	Cette page charge simplement les informations de
|	la configuration du l'application Bow
|
*/
return  (object) [
    "mail" => require "mail.php",
    "database" => require "database.php",
    "application" => require "application.php",
    "resource" => require "resource.php"
];

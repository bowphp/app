<?php

/*-----------------------------
| Chargement des routes
|------------------------------
| Tout les routes definir par
| l'utilisateur doit etre
| charger ici.
*/

require "users.php";

$app->to404(function() {
    echo "404 Not Found File.";
});

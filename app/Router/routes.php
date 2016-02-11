<?php

/**---------------------------------------------------------------------------------
| Chargement des routes
|-----------------------------------------------------------------------------------
|	Chargement des routes
| 	=====================
| 	Voici où vous pouvez enregistrer toutes les routes pour une application.
| 	Il est un jeu d'enfant . Il suffit de dire à Snoop les URI aux quelles il doit répondre
| 	et de lui donner le contrôleur à appeler lorsque cet URI est demandée.
|
*/

$app->get("/", function ($req) {
	view("welcome");
});
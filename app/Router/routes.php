<?php

/**---------------------------------------------------------------------------------
| Chargement des routes
|-----------------------------------------------------------------------------------
|	Chargement des routes
| 	=====================
| 	Voici où vous pouvez enrégistrer toutes les routes pour une application.
| 	Il est un jeu d'enfant . Il suffit de dire à Bow les URI aux quelles il doit répondre
| 	et de lui donner le contrôleur à appeler lorsque cet URI est demandée.
|
*/

$app->get("/", function ($req) {
	view("welcome");
});

$app->get("/test", function() {
    view("test.exemple");
});
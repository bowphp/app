<?php

/**-------------------------------------------------------------------------------------------------
| Chargement des routes
|---------------------------------------------------------------------------------------------------
|	Chargement des routes
| 	=====================
| 	Voici où vous pouvez enrégistrer toutes les routes pour une application.
| 	C'est un jeu d'enfant vous verez. Il suffit de dire à Bow les URI aux
|	quelles il doit répondre et de lui donner le contrôleur à appeler
| 	lorsque cet URL est demandée.
|
|   Suivez l'exemple suivant, il vous donne un aperçu sur comment ça fonction en général.
*/

$app->get("/", function () {
	view("welcome");
});

$app->get("/exemple", function() {
    view("exemple");
});

$app->get("/:other", function() {
	view("404");
})
->where(["other" => ".+"]);

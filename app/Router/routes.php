<?php

/**---------------------------------------------------------------------------------
| Chargement des routes
|-----------------------------------------------------------------------------------
|
| Voici où vous pouvez enregistrer toutes les routes pour une application.
| Il est un jeu d'enfant . Il suffit de dire à Snoop les URI aux quelles il doit répondre
| et de lui donner le contrôleur à appeler lorsque cet URI est demandée.
|
*/

$app->get("/", function ($req) {
	view("template.welcome");
});

$app->put("/x", function ($req) {
	json(select("select * from users"));
});

$app->put("/x/:id", function ($req)
{
	json(select("select * from users"));
})
->where(["id" => "\d+"]);

$app->delete("/x", function ($req)
{
	json(select("select * from users"));
});

$app->get("/controller", ["middleware" => "auth", "UserController@delete"]);

$app->get("/test/:id", function ($req, $id)
{

})->where(["id" => "\d+"]);

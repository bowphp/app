# SNOOP - PHP
Implementation simplifier de système de gestion de route en php.

Exemple de code de mon projet courrent
======================================

```php
<?php

/*-------------------------
| Chargement
|--------------------------
| Inclusion de Snoop
*/
require __DIR__. "/../system/SnoopAutoload.php";

/*-------------------------
| Chargement
|-------------------------
| Chargement des namespaces
*/
System\SnoopAutoload::register();

/*-------------------------
| Chargement
|--------------------------
| Chargement du Singleton
| global.
*/
$app = System\Snoop::loader();

/*-------------------------
| Configuration du site.
|--------------------------
| - Definition des `vues`
| - Definition des `roots`
| - Definition du `public`
*/
$app->set("views", dirname(__DIR__) . "/views");
$app->set("root", "/php/demo-cb");
$app->set("public", $app->getRoot() . "/public/");

/*------------------------
| KEY ENCRYPT
|-------------------------
| Definition de la logic
} de cryptage
*/
$app->crypt_key = (object) 
[ "image_begin_key" => "user6/*9829e$32yjd#cbonline#image#or#cni",
"user_begin_key" => "userMid84+sdlu+nkdpsdw+4#cbonline" ];

/*-------------------------
| Demarage de la session
|--------------------------
*/
$app->startSession();

/*-------------------------
| lancement du systeme de
| routing. Route princial
|--------------------------
| Branchement de la route
| Principale.
*/
$app->get("/", function() use ($app)
{
	$app->render("layout.php", [
		"public" => $app->getPublicPath(),
		"root" => $app->getRoot(),
		"template" => "template/bootstrap.html"
	]);
});

// Vous pouvez subdivisé le routigne

/*------------------------------------
| Liste des routes de l'application
|-------------------------------------
| Les routes définient ici sont des
| routes au format absolut
*/

/*------. LISTE * DE * ROUTER .------*/

/*-----------------------------
| Branchement
|------------------------------
| Branchement principale
| -> /cbonline.
*/
$app->mount("/cbonline");

	/*---------------------------------
	| Route sur accueil
	|----------------------------------
	| Route sur la page d'accueil
	| GET /
	*/
	$app->get("/", function() use ($app)
	{
		/*---------------------------------
		| Rendu
		|----------------------------------
		| Lancement du rendu de la pade
		| {{layout.php}}
		*/
		$app->render("layout.php", [
			"public" => $app->getPublicPath(),
			"root" => $app->getRoot(),
			"template" => "template/information.html"
		]);
	});

	/*---------------------------------
	| Route sur formulaire
	|----------------------------------
	| Route sur le formulaire de
	| contact
	| GET /contrat
	*/
	$app->get("/contrat", function() use ($app)
	{
		/*---------------------------------
		| Rendu
		|----------------------------------
		| Lancement du rendu de la pade
		| {{layout.php}}
		*/
		$app->render("layout.php", [
			"public" => $app->getPublicPath(),
			"root" => $app->getRoot(),
			"template" => "template/contrat.html"
		]);
	});

	/*---------------------------------
	| Route sur formulaire
	|----------------------------------
	| Route sur le formulaire d'
	| identification
	| GET /formulaire-d-identification
	*/
	$app->get("/formulaire-d-identification", function() use ($app)
	{
		if (!$app->isSessionKey("contrat")) {
			/*---------------------------------
			| Redirect
			|----------------------------------
			| Redirection en case d'erreur.
			| GET /cbonline/contrat
			*/
			$app->redirect("/cbonline/contrat");
		}

		/*---------------------------------
		| Rendu
		|----------------------------------
		| Lancement du rendu de la pade
		| {{layout.php}}
		*/
		$app->render("layout.php", [
			"public" => $app->getPublicPath(),
			"root" => $app->getRoot(),
			"template" => "template/identification.html",
			"old" => $app->isSessionKey("identification") ? (object) $app->session("identification") : new StdClass()
		]);
	});

	/*---------------------------------
	| Route sur formulaire
	|----------------------------------
	| Route sur le formulaire de
	| transaction
	| GET /mode-de-transaction
	*/
	$app->get("/mode-de-transaction", function() use ($app)
	{
		if (!$app->isSessionKey("contrat") || !$app->isSessionKey("identification")) {
			/*---------------------------------
			| Redirect
			|----------------------------------
			| Redirection en case d'erreur.
			| GET /cbonline/contrat
			*/
			$app->redirect("/cbonline/contrat");
		}
		
		/*---------------------------------
		| Rendu
		|----------------------------------
		| Lancement du rendu de la pade
		| views: {{layout.php}}
		| template: transaction.html
		*/
		$app->render("layout.php", [
			"public" => $app->getPublicPath(),
			"root" => $app->getRoot(),
			"template" => "template/transaction.html",
			"param" => $app->param()
		]);
	});

/*---------------------------------
| Debranchement
|----------------------------------
| Debranchement de la Route
| principal /cbonline.
*/
$app->unmount();

/*-----------------------------
| Branchement
|------------------------------
| Branchement principale
| -> /validation.
*/
$app->mount("/validation");
	/*---------------------------------
	| Connection - Resource
	|----------------------------------
	| Connection a la base de donnee
	| sur la branch [cb_online]
	*/
	$app->connection("cb_online", function($err) use ($app) {
		if ($err) {
			$app->kill($err->getMessage());
		}
	});

	/*---------------------------------
	| Route sur Registrement
	|----------------------------------
	| Route, avec systeme de slug
	| sur tout les elements de
	| validation des donnee
	| du formualaire
	| POST /:slug
	*/
	$app->post("/:slug", function ($slug) use ($app)
	{
		if ($slug == "contrat") {

			if (!$app->isBodyKey("accept")) {
				/*---------------------------------
				| Redirect
				|----------------------------------
				| Redirection en case d'erreur.
				| GET /cbonline/contrat
				*/
				$app->redirect("/cbonline/contrat");
			}


			$app->addSession("contrat", $app->sanitaze($app->body(), true));

			/*---------------------------------
			| Redirect
			|----------------------------------
			| Redirection en case d'erreur.
			| GET /cbonline/{{:slug}}
			*/
			$app->redirect("/cbonline/formulaire-d-identification");

		} else if ($slug == "identification") {

			if (!$app->isSessionKey("contrat")) {
				/*---------------------------------
				| Redirect
				|----------------------------------
				| Redirection en case d'erreur.
				| GET /cbonline/contrat
				*/
				$app->redirect("/cbonline/contrat");
			}

			$route = "/cbonline/formulaire-d-identification";
			require "verificateur/identificateur.php";
			$app->addSession("identification", $app->sanitaze($app->body(), true));

			/*---------------------------------
			| Redirect
			|----------------------------------
			| Redirection en case d'erreur.
			| GET /cbonline/mode-de-transaction
			*/
			$app->redirect("/cbonline/mode-de-transaction");

		} else if ($slug == "transaction") {

			if (!$app->isSessionKey("contrat") || !$app->isSessionKey("identification")) {
				/*---------------------------------
				| Redirect
				|----------------------------------
				| Redirection en case d'erreur.
				| GET /cbonline/contrat
				*/
				$app->redirect("/cbonline/contrat");
			}

			$route = "/cbonline/mode-de-transaction/";
			require "verificateur/transaction.php";
			$app->addSession("transaction", $app->sanitaze($app->body(), true));

			/*---------------------------------
			| Redirect
			|----------------------------------
			| Redirection vers la route
			| Sendmail.
			| GET /sendmail
			*/
			$app->redirect("/sendmail");

		}

	});

/*---------------------------------
| Debranchement
|----------------------------------
| Debranchement de la Route
| principal /validation.
*/
$app->unmount();

/*---------------------------------
| Route sur DB | GET /sendmail
|----------------------------------
| Route sur le systeme d'envoie
| des informations en DB
*/
$app->get("/sendmail", function() use ($app)
{
	if (!$app->isSessionKey("contrat") && !$app->isSessionKey("identification") && !$app->isSessionKey("transaction")) {
		/*---------------------------------
		| Redirect
		|----------------------------------
		| Redirection vers la route
		| GET /cbonline/contrat
		*/
		$app->redirect("/cbonline/contrat");
	}
	/*---------------------------------
	| Degubage
	|----------------------------------
	| Degubage des variables recus.
	*/
	require "soubscribe/add_soubscribe.php";
});

/*-------------------------
| 404 Router
|--------------------------
| Definition d'une route
| 404
*/
$app->with(["other" => "*"])->get(":other", function($other) use ($app) {
	$app->kill("{$other}: 404");
});

/*-------------------------
| Lancement de Snopp
|--------------------------
| Avec un system observeur
| d'erreur on lance le
| systeme snoop
*/
$app->run();
```

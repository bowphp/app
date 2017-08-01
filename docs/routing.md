Routing
-------

Le routing vous permet de maper une url sur un controlleur ou une action particulière.
Le systeme de routing de bow est grèfé directement sur l'instance de l'application.
donc sur la variable `$app`.
Les routes de l'application sont dans le fichier `main.php` du dossier `app/routes`
de votre application.

prototype des methodes du routing

```
$app->verbe(url, [name, ], action);
```
> `verbe` correspond au verbe `http` à associer à la route, soit GET, POST, PUT, DELETE, OPTIONS, PATCH écrite en minuscule.

| paramete | Type |
|----------|------|
| url      | String |
| name      | String, le nom de la route. (optionnel) |
| action   | String, array, function. Le fonction doit retourner un element |

- Avec un callback (aussi appelé `closure` ou `callable` en `php`)

``` php
$app->verbe('/', function() {
	return 'hello world';
});
```

- Avec une collection de fonction dans un tableau:

``` php
$app->verbe('/', [function() {
	echo 'hello world';
}, function() {
	echo 'Bien merci';
}]);
```

- Avec le nom d'un controller

``` php
$app->verbe('/', 'ClassController@actionAExecuter');
```

- Avec le nom d'un controller et un middelware

``` php
$app->verbe('/', ['middleware' => 'ip', 'uses' => 'ClassController@actionAExecuter']);
```

> `verbe` correspond au verbe `http` à associer à la route, soit GET, POST, PUT, DELETE, OPTIONS, PATCH écrite en minuscule.

La mise en place du routage se faire donc via les methodes suivants:

### get

Cette methode permet de maper une url a une requête de type `GET`.

``` php
$app->get('/', function() {
	return 'hello world';
});
```

### post

Cette methode permet de maper une url a une requête de type `POST`

``` php
$app->post('/', function() {
	return 'data posted';
});
```

### put

Cette methode permet de maper une url a une requête de type `PUT`.

Quand vous utilisez des outils qui peut envoyer des requêtes de ce type comme `curl`, `httpie`.
Parcontre les navigateurs ne supportent pas cette methode. Alors dans votre formulaire d'envoie,
il faudra créer un champs comme ceci:

```html
<input type="hidden" name="_method" valude="PUT">
```

ce qui aura pour but de permettre à bow de comprendre votre requête.


``` php
$app->put('/', function() {
	// code ici
});
```

### delete

Cette methode permet de maper une url a une requête de type `DELETE`.

Quand vous utilisez des outils qui peut envoyer des requêtes de ce type comme `curl`, `httpie`.
Parcontre les navigateurs ne supportent pas cette methode. Alors dans votre formulaire d'envoie,
il faudra créer un champs comme ceci:

```html
<input type="hidden" name="_method" valude="PUT">
```

ce qui aura pour but de permettre à bow de comprendre votre requête.


``` php
$app->delete('/', function() {
	// code ici
});
```

### patch

Cette methode permet de maper une url a une requête de type `PATCH`.

Quand vous utilisez des outils qui peut envoyer des requêtes de ce type comme `curl`, `httpie`.
Parcontre les navigateurs ne supportent pas cette methode. Alors dans votre formulaire d'envoie,
il faudra créer un champs comme ceci:

```html
 <input type="hidden" name="_method" valude="PATCH">
```

ce qui aura pour but de permettre à bow de comprendre votre requête.


``` php
$app->patch('/', function() {
	// code ici
});
```

### options

Cette methode permet de maper une url a une requête de type `OPTIONS`.

Quand vous utilisez des outils qui peut envoyer des requêtes de ce type comme `curl`, `httpie`.
Parcontre les navigateurs ne supportent pas cette methode. Alors dans votre formulaire d'envoie,
il faudra créer un champs comme ceci:

```html
 <input type="hidden" name="_method" valude="OPTIONS">
```

ce qui aura pour but de permettre à bow de comprendre votre requête.


``` php
$app->options('/', function() {
	// code ici
});
```

### match

Permet d'associer des methodes `http` sur l'url spécifier.

prototype de la methode `match`.

```
$app->match(verbes, url, action);
```

| paramete | Type |
|----------|------|
| verbes      | Array, La liste de methode `http` |
| url      | String, L'url de la route |
| action      | String, array, callable ou Closure |

``` php
$app->match(['GET', 'POST'], function() {
	// code ici
});
```

### any

Permet d'associer tout les methodes `http` sur l'url spécifier.

prototype de la methode `any`.

```
$app->any(String url, action);
```

| paramete | Type |
|----------|------|
| url      | String, L'url de la route |
| action      | String, array, callable ou Closure |


``` php
$app->any('/', function() {
	// code ici
});
```

### code

Le routing vous permet aussi de capturer le code http telque le fameux `404` et autre, et ensuite
lancer une fonction pour répondre à l'utilisateur.

prototype de la methode `code`.

```
$app->code(statusCode, action);
```

| paramete | Type |
|----------|------|
| statusCode      | Number, Le code http |
| action      | Callable ou Closure, le fonction à éxécuter |


> Notons que les methodes ci-dessus retourne l'instance de l'application.
> Alors vous pouvez chainer les methodes comme ceci.
> 
> ``` php
> $app->get(..., ...)->post(..., ...)->put(..., ...)->delete(..., ...)->patch(..., ...)
> ```


### Personnalisation

Le routing vous permet aussi de personnaliser vos urls. Voici la list des possibilités de personnalisation.

- Capturer des variables dans l'url
- Ajouter des critères, des restrictions sur les urls
- Donner un nom au route
- Association de middleware
- La composition d'action

Pour faire la personnalisation il faut utiliser l'enchainement de methode.
Dans le exemple qui suit nous allons utiliser la methode `get`.

#### Capturer des variables dans l'url

Le routing vous permet de pouvoir capturer des variables dans urls.
Pour le faire il faut imperativement utiliser la notation `:name_de_la_variable`.
Ensuite la variable capturé sera passer en paramètre à l'action (fonction à executer dans le cas où l'url est valide)
quelque soit le nombre de variable.

``` php
$app->get('/:name', function($name) {
	return 'bonjour ' . $name;
});
```

#### Ajouter des critères, des restrictions sur les urls

Parlant de capture de variable. Sécurisé ces variables est primordial. Alors le routing vous permet
aussi d'ajout des validateurs sur le variable. C'est la methode `where` qui s'en occupe.

prototype de la methode `where`.

```
$app->where(String name, String value);
// ou
$app->where(array rules);
```

| paramete | Type |
|----------|------|
| name      | String, Le nom de la variable |
| value      | String, Le critaire de validation |
| rules      | Array, Tableau associatif dont la clé est la varibale et la valeur est le critaire de validation |

``` php
$app->get('/:name', function($name) {
	return 'bonjour ' . $name;
})->where('name', '[a-z]+');

// S'il y a plusieurs variables
$app->get('/:name/:lastname/:number', function($name, $lastname, $number) {
	return 'bonjour '.$name.' '.$lastname.' et votre numero est '.$number;
})->where([
	'name' => '[a-z]+', 
	'lastname' => '[a-z]+', 
	'number' => '\d+'
]);
```

#### Donner un nom au route

Quand vous être dans le développement d'un gros projet, les routes deviendront nombreuses
et la gestion visuel pour le développeur deviendra difficile.

Alors `bow` vous permet de donner des noms à vos routes comme ceci:

prototype de la methode `name`.

```
$app->name(String name);
```

| paramete | Type |
|----------|------|
| name    | String, Le nom de la route |

``` php
$app->get('/:name', function($name) {
	return 'bonjour ' . $name;
})->name('hello');

// ou
$app->get('/:name', 'hello', function($name) {
	return 'bonjour ' . $name;
});
```

#### Association de middleware

Un middleware c'est un ou plusieurs actions qui ce placent entre la requete et l'action
a executer.

Plus d'information sur le sujet allez ce lien [middleware](#documentation-middlewares)


``` php
$app->get('/:name', ['middleware' => 'ip', function($name) {
	return 'bonjour ' . $name;
}])->name('hello');
```

#### La composition d'action

``` php
$app->get('/:name', ['middleware' => 'ip', 'uses' => 'Controller@action']);
```

### group

Souvant vous serez amener à vouloir grouper vos routes et effectuer un branchement, de bien orienté votre logique.
Les urls peuvents souvants se répéter comme ceci:

```php
$app->get('users', function() {
	// code ici
});

$app->get('users/:id', function($id) {
	// code ici
});

$app->get('users/:id/delete', function($id) {
	// code ici
});
```

Dans ce case nous avons `users` qui se répéte plusieur fois.
Comment bien organiser tout ça?

La réponse est le groupage de route. Alors la methodes groupe nous permet
de grouper plusieur urls.

prototype de le methode `group`.

```
$app->group(url, action);
```

| paramete | Type |
|----------|------|
| url      | String |
| action   | closuer, callable. Cette fonction prendra en parametre l'instance de l'application |

Donc pour réorganiser le code precedent il faut faire:

```php
$app->group('/users', function($app) {
	$app->get('/', function() {
		// code ici
	});
	$app->get('/:id', function() {
		// code ici
	});
	$app->get('/:id/delete', function() {
		// code ici
	});
});
```

[Voir la vidéo](https://www.youtube.com/watch?v=:id 'video')
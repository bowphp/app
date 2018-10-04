<h1 align="center">
    <img src="https://github.com/bowphp/arts/blob/master/bow.jpg">
    <br/>Bow
</h1>
<h4 align="center">The BOW PHP framework</h4>
<br/>
<p align="center">
    <a href="https://github.com/bowphp/docs" title="docs"><img src="https://img.shields.io/badge/docs-read%20docs-blue.svg?style=flat-square"/></a>
    <a href="https://packagist.org/packages/bowphp/app" title="version"><img src="https://img.shields.io/packagist/v/bowphp/app.svg?style=flat-square"/></a>
    <a href="https://github.com/bowphp/app/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>
    <a href="https://travis-ci.org/bowphp/app" title="Travis branch"><img src="https://img.shields.io/travis/bowphp/app/master.svg?style=flat-square"/></a>
</p>

<p align="center">
    Bow est un micro framework écrit Par la communauté <strong><a href="http://ayiyikoh.org">#Ayiyikoh</a></strong> et plusieurs autre contributeurs. Le but c'est de permettre aux débutants qui veulent travailler sur un projet un peu plus grand de s'y lancer. Afin de comprendre les rouages du developpement collaboratif.
    <br>
    <strong>N'hésitez pas à commencez maintenant.</strong>
</p>

## Prérequis

Vous devez vous assurer les différents elements suivants sont installés sur votre machine.

* PHP >= 7
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* XML PHP Extension
* JSON PHP Extension

# Installation

Pour installer une copie de Bow il vous faut d'abord installer [composer](https://getcomposer.org) ensuite vous lancez la commande suivante:

```sh
  $ composer create-project --prefer-dist bowphp/app
  $ cd app
  $ php bow run:server --port=8000 --host=0.0.0.0
```

> __NB__: Il est conseillé d'installer `composer` de façon globale sur votre machine. Pour ce faire référez-vous à la [documentation](https://getcomposer.org/download) d'installation de composer.
> Si vous n'êtes pas familier à `composer`, nous vous invitons à parcourir la documentation.

## Test rapide

Dans le dossier `routes`, ouvrez le fichier `get.php` et ajoutez:

```php
$app->get('/hello/:name', function($name) {
    return 'Hello, world '.$name;
});
```

Dans votre navigateur et tapez `http://localhost:8000/hello/bow`. `8000` est le port par défaut quand vous faites `php bow run:server`.

```html
hello, world bow
```

Ou avec `curl`

```sh
$ curl http://localhost:5000/hello/bow
# Hello world bow
```

# Configuration

## Dossier Public

Après l'installation de Bow, vous devrez configurer le `document root` de votre serveur pour qu'il soit pointer vers le dossier `public`. Le fichier `index.php` qui se trouve dans le dossier public sert de point d'entrer pour toutes les requêtes HTTP (le front controlleur).

## Fichier de configuration

Tout les fichiers de configurations de Bow framework sont stockés dans le dossier `config`. Et tous les options sont documentés pour vous permettre d'aller vite dans votre dévéloppement. Vous êtes libre de regarder ces files pour vous famillariser avec les options disponibles.

## Permissions sur les dossiers

Après l'installation de Bow, vous aurez bésoin de configurer quelques permissions. Les dossiers contenu dans le dossier `storage` doivents avoir les permissions d'écriture sur le serveur web.

Vous pouvez également configurer quelques composants supplémentaires de Bow, tels que:

- [Session](https://github.com/bowphp/docs/blob/master/session.md)
- [Base de donnée](https://github.com/bowphp/docs/blob/master/database.md)
- [Réssource](https://github.com/bowphp/docs/blob/master/filesystem.md)

> Je vous invite à régarder ces configurations.

# Configuration Serveur Web 

## Apache

Bow inclut un fichier `public/.htaccess` qui est utilisé pour fair de ré-écriture d'URLs sans le `index.php` front controlleur dans le dossier. Après avoir installer Bow avec Apache, Soyez sûr que le module `mod_rewrite`  est activé sinon vous n'irrez pas bien loin.

Si le fichier `.htaccess` par defaut dans Bow ne fonction pas avec votre installation d'Apache, Essayez cette alternative:

```sh
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

## Nginx

Si vous utilisez Nginx, les directives suivantes dans votre configuration sauront faire fonctionner votre application Bow, tout les requêtes seront directement envoyer vers le front controlleur `index.php`:

```sh
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

# Contribution

Pour participer au projet il faut:

+ Fork le projet afin qu'il soit parmi les répertoires de votre compte github ex :`https://github.com/votre-compte/app`
+ Cloner le projet depuis votre compte github `git clone https://github.com/votre-crompte/app`
+ Créer un branche qui aura pour nom le résumé de votre modification `git branch branche-de-vos-traveaux`
+ Faire une publication sur votre dépot `git push origin branche-de-vos-traveaux`
+ Enfin faire un [pull-request](https://www.thinkful.com/learn/github-pull-request-tutorial/Keep-Tabs-on-the-Project#Time-to-Submit-Your-First-PR)

# Auteurs

- Franck Dakia <dakiafranck@gmail.com> - [@franck_dakia](https://twitter.com/franck_dakia)
- Ayiyikoh <fablab@ayiyikoh.org> - [@ayiyikoh](https://twitter.com/ayiyikoh) hashtag: __#GoAyiyikoh__

# Contact

SVP s'il y a un bogue sur le projet veuillez me contacter par email ou laissez moi un message sur le [slack](https://bowphp.slack.com).
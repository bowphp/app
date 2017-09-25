<h1 align="center">
    <img src="https://github.com/papac/bow/blob/master/public/img/bow.jpg">
    <br/>Bow
</h1>
<h4 align="center">The BOW PHP framework</h4>
<br/>
<p align="center">
    <a href="https://papac.github.com/bow" title="docs"><img src="https://img.shields.io/badge/docs-read%20docs-blue.svg?style=flat-square"/></a>
    <a href="https://packagist.org/papac/bow" title="version"><img src="https://img.shields.io/packagist/v/papac/bow.svg?style=flat-square"/></a>
    <a href="https://github.com/papac/bow/blob/master/LICENSE" title="license"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square"/></a>
    <a href="https://travis-ci.org/papac/bow" title="Travis branch"><img src="https://img.shields.io/travis/papac/bow/master.svg?style=flat-square"/></a>
</p>

<p align="center">
    Bow est un micro framework écrit Par la communauté <strong><a href="http://ayiyikoh.org">#Ayiyikoh</a></strong> et plusieurs autre contributeurs. Le but c'est de permettre aux débutants qui veulent travailler sur un projet un peu plus grand de s'y lancer. Afin de comprendre les rouages du developpement collaboratif.
    <br>
    <strong>N'hésitez pas à commencez maintenant.</strong>
</p>

# Installer

Pour installer une copie de Bow il vous faut d'abord installer [composer](https://getcomposer.org) ensuite vous lancez la commande suivante:

```sh
  $ php composer.phar create-project --prefer-dist papac/bow
  $ cd bow
  $ php bow serve
```

> __NB__: Il est conseillé d'installer `composer` de façon globale sur votre machine. Pour ce faire référez-vous à la [documentation](https://getcomposer.org/download) d'installation de composer.
> Si vous n'êtes pas familier à `composer`, nous vous invitons à parcourir la documentation.

# Test

Dans le dossier `routes`, ouvrez le fichier `get.php` et ajoutez:

```php
$app->get('/hello/:name', function($name) {
    return 'hello world '.$name;
});
```

Dans votre navigateur et tapez `http://localhost:5000/hello/bow`. `5000` est le port par défaut quand vous faites `php bow serve`.
```
=>// hello world bow
```

Ou avec `curl`
```
$ curl http://localhost:5000/hello/bow
=>// hello world bow
```

# Contribution

Pour participer au projet il faut:

+ Fork le projet afin qu'il soit parmi les répertoires de votre compte github ex :`https://github.com/votre-compte/bow`
+ Cloner le projet depuis votre compte github `git clone https://github.com/votre-crompte/bow`
+ Créer un branche qui aura pour nom le résumé de votre modification `git branch branche-de-vos-traveaux`
+ Faire une publication sur votre dépot `git push origin branche-de-vos-traveaux`
+ Enfin faire un [pull-request](https://www.thinkful.com/learn/github-pull-request-tutorial/Keep-Tabs-on-the-Project#Time-to-Submit-Your-First-PR)

# Authors
> Franck Dakia <dakiafranck@gmail.com> &bull; [@franck_dakia](https://twitter.com/franck_dakia)
> Ayiyikoh <fablab@ayiyikoh.org> &bull; [@ayiyikoh](https://twitter.com/ayiyikoh) hashtag: __#GoAyiyikoh__

---
> SVP s'il y a un bogue sur le projet veuillez me contacter.
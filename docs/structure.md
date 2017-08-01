Configuration
-------------

## Structure

L'orgination de `bow` respect le parten *MVC*, entendez par *M*odel *V*ue *C*ontrolleur.

| Dossier ou fichier | Description |
|---------|-------------|
| __app__ | Contient les dossiers de l'application. C'est le dossier dans lequel vous allez programmer votre application à `95%`. Il contient entre autre le dossier `Controller`, le dossier `Middelware`, le dossier `routes` et `views`, (si vous générez un validateur le dossier Validation apparaitra). Enfin tout les fichiers du model y seront stocker |
| __assets__ | Contient les assets de l'application. Il contient entre autre le dossier `js`, le dossier `sass` et le dossier `image`. Qui sont le assets de votre application. C'est la que vous allez mettre vos fichiers static et ensuite le compiler |
| __config__ | Contient tout la configuration de l'application. |
| __lang__ | Contient les dossier des langs.|
| __view__ | dossier dans lequel sera souvegardé les vues de l'application.|
| __routes__ | dossier dans lequel sera souvegardé les routes de votre application|
| __migration__ | Régroupe tout les fichiers de migration de la base de donnée. Il existe un fichier nommé `.registers` qui ne doit en aucun cas être supprimer, c'est la mémoire en effet du système de migration de bow|
| __seeders__ | Régroupe tout les fichiers de migration de la base de donnée. Il existe un fichier nommé `.registers` qui ne doit en aucun cas être supprimer, c'est la mémoire en effet du système de migration de bow|
| __src__ | Régroupe tout les fichiers de migration de la base de donnée. Il existe un fichier nommé `.registers` qui ne doit en aucun cas être supprimer, c'est la mémoire en effet du système de migration de bow|
| __public__ | Régroupe les feuilles de styles et fichier javascript ou tout autre fichier statique. (Si vous utiliser des préprocésseurs. Nous vous invitons a les mettres dans le dossier `assets` pour ensuite les compilés enfin de les protégés des acces public) |
| __storage__ | Contient le dossier dans lequel est sauvegardé les `caches`, les `logs` et le stockage de fichier uploader par le bien du système de `Storage` de bow de l'application.|
| __tests__ | Contient le dossier dans lequel vous allez faire les tests de l'application.|
| __vendor__ | Contient les dépendances de l'application. Ce dossier est généré pas `composer`. |
| __.gitignore__ | Fichier de configuration  git |
| __LICENSE__ | Licence de l'application. Nottons que la licence est MIT |
| __README.md__ | Le fichier de description de bow |
| __bow__ | Le lancer de tache de bow. `php bow help` pour voir l'aide |
| __composer.json__ | Le fichier de dependance de bow qui permet à `composer` d'install les bonnes dependance |
| __composer.lock__ | Le fichier de verrou de `composer` |
| __gulpfile.js__ | Le fichier de configuration de [`gulp`](https://npm.org/packages/gulp) |
| __package.json__ | Le fichier de configuration de [`npm`](https://npm.org) |
| __phpunit.xml__ | Le fichier de configuration de [`phpunit`](https://github.com/phpunit/phpunit) |
| __server.php__ | Le fichier de configuration du serveur local de bow. C'est ce fichier qu'utilise le lancer de tache pour activer le serveur local. |


## Installation

| dossier | description|
|---------|------------|
| __app__ | contient les dossier de l'application. C'est le dossier dans lequel vous allez programmer votre application.|
| __config__ | contient tout la configuration de l'application. |
| __lang__ | contient les dossier des langs.|
| __migration__ | régroupe tout les fichiers de migration de la base de donnée. |
| __public__ | régroupe les feuilles de styles et fichier javascript ou tout autre fichier statique. |
| __storage__ | contient le dossier dans lequel est sauvegardé les caches et les logs de l'application.|
|__vendor__ | contient les dépendances de l'application. Ce dossier est généré pas `composer`. |

## App

C'est votre repertoire de travail sur bow. C'est la que vous allez inserer tout les fichiers de
votre application. 

Ici vous rétrouverez les dossiers suivant.

- __Controllers__ dossier dans lequel sera souvegardé les controlleurs de l'application.
- __Middleware__ dossier dans lequel sera souvegardé les middlewares de l'application.

## storage

Ici vous rétrouverez les dossiers suivant.

- __logs__ dossier dans lequel est sauvegardé les logs de l'application.
- __cache__ dossier dans lequel l'application sauvegarde les caches de l'applications
- __app__ dossier dans lequel l'application sauvegarde les fichiers uploader de l'applications

Installation [〈 Previous](http://papac.github.io/docs/routing.html "installation") &middot; [Next 〉](http://papac.github.io/docs/routing.html "Le routing") Le routing

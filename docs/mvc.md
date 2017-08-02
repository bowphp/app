# **MVC**
Interactions entre le modèle, la vue et le contrôleur
Modèle-vue-contrôleur ou **MVC** est un motif d'architecture logicielle destiné aux interfaces graphiques lancé en 1978 et très populaire pour les applications web. Le motif est composé de trois types de modules ayant trois responsabilités différentes : les modèles, les vues et les contrôleurs.

- Un modèle(Model) contient les données à afficher.
- Une vue(View) contient la présentation de l'interface graphique.
- Un contrôleur(Controller) contient la logique concernant les actions effectuées par l'utilisateur.

Ce motif est utilisé par de nombreux frameworks pour applications web tels que Ruby on Rails, Django, ASP.NET **MVC**, Spring, Struts, Symfony, Apache Tapestry ou Angular Js.

## Histoire

Le motif **MVC** a été créé par Trygve Reenskaug lors de sa visite du Palo Alto Research Center (abr. PARC) en 19781. 
Le nom original est thing model view editor pattern, puis il a été rapidement renommé model-view-controller pattern1. 
Le patron **MVC** a été utilisé la première fois pour créer des interfaces graphiques avec le langage de programmation Smalltalk en 19801.
Description

Une application conforme au motif **MVC** comporte trois types de modules : les modèles, les vues et les contrôleurs2.

## Modèle
Élément qui contient les données ainsi que de la logique en rapport avec les données: validation, lecture et enregistrement3. Il peut, dans sa forme la plus simple, contenir uniquement un simple texte, voire des données beaucoup plus compliquées3. Le modèle représente l'univers dans lequel s'inscrit l'application2. Par exemple pour une application de banque, le modèle représente des comptes, des clients, ainsi que les opérations telles que dépôt et retraits, et vérifie que les retraits ne dépassent pas la limite de crédit2. Le modèle est indépendant de la vue et du contrôleur et ne s'en sert pas3.

## Vue
Partie visible d'une interface graphique3. La vue se sert du modèle, et peut être un diagramme, un formulaire, des boutons, etc. 
Une vue contient des éléments visuels ainsi que la logique nécessaire pour afficher les données provenant du modèle3. 
Dans une application web une vue contient des balises HTML.

## Contrôleur
Module qui traite les actions de l'utilisateur, modifie les données du modèle et de la vue.

Les trois éléments sont indépendants les uns des autres, le modèle ne se sert ni de la vue ni du contrôleur, il peut cependant leur envoyer des messages. 
Il y a deux liens entre la vue et le modèle: premièrement la vue lit les données du modèle et deuxièmement reçoit des messages provenant du modèle. 
Dans la mesure où une vue est associée à un modèle et un modèle est indépendant, un même modèle peut être utilisé par plusieurs vues.
Le contrôleur dépend de la vue et du modèle : la vue comporte des éléments visuels que l'utilisateur peut actionner. 
Le contrôleur répond aux actions effectuées sur la vue et modifie les données du modèle3.
Dans le cas d'un view model, le modèle contient les données que le contrôleur transmet à la vue. 
Dans le cas d'un domain model il contient toutes les données en rapport avec l'activité, ainsi que la logique des opérations de modification et de validation des données.
MVP et MVVM
Les motifs model-view-presenter (MVP) et model-view-view model (MVVM) sont semblables au motifs modèle-vue-contrôleur, à quelques différences près.

   - Dans le patron MVP, le contrôleur est remplacé par une présentation. La présentation est créée par la vue et lui est associée par une interface. 
     Les actions utilisateur déclenchent des événements sur la vue, et ces événements sont propagés à la présentation en utilisant l'interface.
   - Dans le patron MVVM il y a une communication bidirectionnelle entre la vue et le modèle, les actions de l'utilisateur entraînent des modifications des données du modèle.

Dans les applications web

Le motif **MVC** a été créé dans le but de mettre en œuvre des interfaces utilisateur2. 
Certains détails sont alignés avec le langage Smalltalk, mais les grandes lignes peuvent s'appliquer à n'importe quel environnement. 
Le cycle action->mise à jour->affichage induit par ce patron est bien adapté aux applications web2. 
De plus le patron impose la séparation des sujets, et les balises HTML sont ainsi confinées aux vues, ce qui améliore la maintenabilité de l'application. 
C'est le framework pour applications web Ruby on Rails qui a apporté un regain d'intérêt pour ce patron2.

Ce patron est utilisé par de nombreux frameworks pour applications web tels que Ruby on Rails, Django, ASP.NET **MVC**, Spring, Struts ou Apache Tapestry.

Dans la mise en œuvre classique du patron **MVC**, la vue attend des modifications du modèle, puis modifie la présentation des éléments visuels correspondants. 
Cette mise en œuvre est appliquée pour les applications de bureau avec des framework comme Swing5. Le protocole HTTP ne permet pas cette mise en œuvre pour les applications web. 
Pour ces dernières, lors d'une action de l'utilisateur, le contenu de la vue est recalculé puis envoyé au client.
Flux de traitement

En résumé, lorsqu'un client envoie une requête à l'application :

- La requête envoyée depuis la vue est analysée par le contrôleur (par exemple un clic de souris pour lancer un traitement de données) ;
- Le contrôleur demande au modèle approprié d'effectuer les traitements et notifie à la vue que la requête est traitée (via par exemple un handler ou callback) ;
- La vue notifiée fait une requête au modèle pour se mettre à jour (par exemple affiche le résultat du traitement via le modèle).

## Avantages	
Un avantage apporté par ce modèle est la clarté de l'architecture qu'il impose. Cela simplifie la tâche du développeur qui tenterait d'effectuer une maintenance ou une amélioration sur le projet. 
En effet, la modification des traitements ne change en rien la vue. Par exemple on peut passer d'une base de données de type SQL à XML en changeant simplement les traitements d'interaction avec la base, et les vues ne s'en trouvent pas affectées.

Le **MVC** montre ses limites dans le cadre des applications utilisant les technologies du web, bâties à partir de serveurs d'applications[réf. nécessaire]. 
Des couches supplémentaires sont alors introduites ainsi que les mécanismes d'inversion de contrôle et d'injection de dépendance.
Différence avec l'architecture trois tiers

### Article détaillé : Architecture trois tiers.

L'architecture trois tiers est un modèle en couches, c'est-à-dire que chaque couche communique seulement avec ses couches adjacentes (supérieures et inférieures) et le flux de contrôle traverse le système de haut en bas. 
Les couches supérieures contrôlent les couches inférieures, c'est-à-dire que les couches supérieures sont toujours sources d'interaction (clients) alors que les couches inférieures ne font que répondre à des requêtes (serveurs).

Dans le modèle **MVC**, il est généralement admis que la vue puisse consulter directement le modèle (lecture) sans passer par le contrôleur.
Par contre, elle doit nécessairement passer par le contrôleur pour effectuer une modification (écriture). 
Ici, le flux de contrôle est inversé par rapport au modèle en couches, le contrôleur peut alors envoyer des requêtes à toutes les vues de manière qu'elles se mettent à jour.

Dans l'architecture trois tiers, si une vue modifie les données, toutes les vues concernées par la modification doivent être mises à jour, d'où l'utilité de l'utilisation du **MVC** au niveau de la couche de présentation. 
La couche de présentation permet donc d'établir des règles du type « mettre à jour les vues concernant X si Y ou Z sont modifiés ». 
Mais ces règles deviennent rapidement trop nombreuses et ingérables si les relations logiques sont trop élevées. 
Dans ce cas, un simple rafraîchissement des vues à intervalle régulier permet de surmonter aisément ce problème. 
Il s'agit d'ailleurs de la solution la plus répandue en architecture trois tiers, l'utilisation du **MVC** étant moderne et encore marginale.
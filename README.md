Contact Form
===

Exercice technique / fonctionnel utilisé par ACSEO pour ses recrutements.

Contexte
---

Vous êtes développeur chez ACSEO. Vous recevez une demande de la part d'un client pour la mise en place d'une nouvelle fonctionnalité sur son site Internet.

> Nous souhaiterions mettre en place un formulaire de contact sur notre site. Le formulaire de contact doit être simple : il doit nous permettre de connaitre les coordonnées de l'internaute, et sa question. Il nous faut au moins son nom, son email, et sa question pour que nous traitions sa demande.
Il nous faudrait aussi un petit back-office avec accès sécurisé pour permettre au webmaster de consulter la liste des demandes, et de pouvoir cocher les messages que nous avons traité
Le projet initial étant basé sur Symfony 3, il vous est demandé de mettre en place la solution sur la base de ce Framework.

Version de développement
---

* Version PHP     : 7.1
* Version Symfony : 3.3.6

Mise en route
---

* Cloner le projet
``git clone https://github.com/choukri-ibitssam/acseoIC.git``

* Direction le projet
``cd acseoIC``

* Installation des dépendances
``composer install``

* Création de la base de données
``bin/console doctrine:database:create``

* Création du schéma de données
``bin/console doctrine:schema:update -f``

* Création d'un utilisateur
``bin/console fos:user:create``

* Ajout du rôle Webmaster à l'utilisateur
``bin/console fos:user:promote <username> ROLE_WEBMASTER``

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Informations générales

Ce projet est une application web traitant les bases du framework Laravel. En utilisant une base de données SQLite, le but est de créer plusieurs fonctionnalités.

## Démarrage

1- Dans l’invite de commande, placez-vous dans le répertoire que vous souhaitez et faites la commande :  

![image](https://user-images.githubusercontent.com/62068763/79251590-a0635700-7e80-11ea-906b-e9866fc80c75.png)

2- Une fois cloné, ouvrez le dossier LaravelBlog. A la racine du projet, ouvrez le fichier .env via un éditeur, et modifiez le chemin de DB_DATABASE en votre propre chemin. Exemple :  

![image](https://user-images.githubusercontent.com/62068763/79254807-91cb6e80-7e85-11ea-8d1b-f80e7af472b7.png)

3- Une fois ce fichier modifié, retournez dans l’invite de commande. Placez-vous dans le répertoire contenant le projet et utilisez la commande :  

![image](https://user-images.githubusercontent.com/62068763/79251924-1ff12600-7e81-11ea-8baa-cb4ae2e7c692.png)

4- Sur un navigateur web, copiez l'adresse du lien affiché en dessous de la commande précédente. Exemple :  

![image](https://user-images.githubusercontent.com/62068763/79253684-e66dea00-7e83-11ea-991b-3f4c523a33ce.png)

## Fonctionnalités

0 – TP2 complété 

La page d’Accueil affiche un texte de bienvenue et les 3 derniers articles publiés.  
La page Articles affiche une liste de tous les articles divisés en plusieurs ‘pages’ de 5 articles.  
La page d’un article s’affiche lorsque l’utilisateur clique sur « Voir ». Cette page affiche toutes les informations de l’article présentent dans la table posts de la base de données.  
  
La page contact affiche un formulaire afin d’envoyer un message. Le message est créé dans une vue utilisant le Markdown. Grâce à Mailtrap, les tests d’envois ont été effectué.  
Pour tester cette fonctionnalité, il faut créer un compte simple et rapide sur [Mailtrap](https://mailtrap.io/).  
Une fois connecté, un username et un password vont vous être confié.  
Enfin, dans le fichier .env à la racine du projet, modifiez les champs MAIL_USERNAME et MAIL_PASSWORD par vos propres informations. Vous recevrez donc les messages de contact dans votre boite mail Mailtrap.  

![image](https://user-images.githubusercontent.com/62068763/79254082-7ca21000-7e84-11ea-9459-cc5fe9582563.png)

1 – Gestion des commentaires

Sous chaque article, tous les utilisateurs peuvent poster un commentaire. Une fois publié, ce commentaire contiendra le contenu, le nom de l’utilisateur ainsi que la date à laquelle il a soumis le commentaire. L’utilisateur est redirigé vers la page de connexion s’il souhaite commenter un article sans être connecté.

2 – CRUD des articles

Quatre options sont disponibles pour tous les articles. CREATE, READ, UPDATE et DELETE.  
Si l’utilisateur ne s’est pas connecté (donc un visiteur), alors il pourra seulement voir les articles.  
Si l’utilisateur est connecté, alors il pourra voir les articles et ajouter un article.  
Si l’utilisateur est l’auteur de l’article, alors il pourra éditer et supprimer son article.  
Enfin l’administrateur pourra faire les quatre options sur tous les articles.

3 – Identification / Authentification qui protège l’accès à l’administration

L’administrateur a accès à une page « Liste des utilisateurs ». Il peut changer le rôle d’un utilisateur, modifier le nom et l’email de chaque utilisateur (même le sien) et supprimer des utilisateurs.  
  
Sur l’application, le visiteur peut s’enregistrer et se connecter afin de profiter des fonctionnalités.
Il peut aussi réinitialiser son mot de passe en cas de perte. 

4 – Ajout de rôles utilisateurs 

Deux rôles ont été ajouté à l’application : admin et user. Tous les nouveaux utilisateurs seront affectés au rôle user.

Pour tester :  
Administrateur - email : admin@admin.fr | mot de passe : password  
Utilisateur - email : user@user.fr | mot de passe : password

5 – Ajout de fichiers média pour les articles

Un article pourra contenir une image de manière optionnelle lors de la création d’un article.  
En éditant son article, l’auteur peut modifier ou ajouter une image si besoin.

6- Identification avec Google et Github en utilisant Socialite

Une connexion via un compte Google ou Github est possible sur cette application web. Même avec ce type d’identification, les utilisateurs sont affectés au rôle user. En créant une application sur [Google for developper](https://developers.google.com/) et [Github for developper](https://developer.github.com/program/), un CLIENT_ID et un CLIENT_PASSWORD vous serons affectés.  
  
Pour tester ces connexions, dans le fichier .env à la racine du projet, modifiez les champs MAIL_USERNAME et MAIL_PASSWORD par vos propres informations.  Exemple pour Github :  

![image](https://user-images.githubusercontent.com/62068763/79254589-40bb7a80-7e85-11ea-85c9-04c3cc6a9bba.png)

## Remarques

La connexion via Facebook n’est pas encore opérationnelle à cause d’une erreur :
Argument 1 passed to Illuminate\Auth\SessionGuard::login() must implement interface Illuminate\Contracts\Auth\Authenticatable

## Auteurs

Abdessami GHODBANE et Romain PINEL—GERMAIN, étudiants en Master MIASHS WIC.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

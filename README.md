# README

## Game Forum

Venez découvrir une application avec des forums de jeux vidéos revisités aux goûts du jour dans un style web moderne. Parcourez les forums afin de trouver les informations qui correspondent à vos attentes!


## Prérequis

Le projet a été conçu avec l'aide de Wampserver et de PhpMyAdmin

https://www.wampserver.com/


Mettez le projet dans ce chemin C:\wamp64\www\ __(votre projet)__


Ensuite, exécuter dans l'ordre ces commandes pour installer les dépendances du projet  :

```bash
composer install
npm install
```

Puis les commandes pour installer la base de données, les migrations et les fixtures

```bash
php bin/console doctrine:datebase:create
```

```bash
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

```bash
php bin/console doctrine:fixtures:load
```


## Commandes supplémentaires

Cette commande permet de construire tailwind :

```bash
npm run build
```

Cette commande permet de construire et d'observer tailwind à chaque fois que vous sauvegarderez des modifications sur les fichiers liées à tailwind :

```bash
npm run tailwind 
```

> [!CAUTION]
> Les deux commandes de tailwind sont importantes dans le cas où tailwind n'est pas bien exécuté sur le projet. Si tailwindcss est bien visible sur le site, vous n'aurez pas besoin de les exécuter!


## Droits d'utilisateurs

'ROLE_USER' est donné pour tous les utilisateurs inscrits sur le site 

**Exemple d'utilisateur** :

_Utilisateur_ : `Okok32@gmail.com`

_Mot de passe_ : `okokokok`


'ROLE_ADMIN' est donné uniquement à un **seul utilisateur** actuellement :

_Admin_ : `_Lepetitfou_@gmail.com`

_Mot de passe_ : `claquesolide24`

## Lien de la démo

https://youtu.be/WiUPglKuz7I

# Audiora 🎵

**Audiora** est une plateforme developpée par 
@MathieuAudibert & @ismaa2k de *streaming musical*[^1] lors d'un projet de validation de renforcement php.

Nous devions utiliser les technologies listées dans : [Configuration](#configuration-requise) 

[^1]: Projet a but non lucratif.

# Sommaire

- [Fonctionnalités](#fonctionnalités)
- [Tutoriel](#tutoriel-dutilisation)
    - [Configuration](#configuration-requise)
    - [Installation](#installation)
    - [Utilisation](#utilisation)
- [Contact](#contact)

# Fonctionnalités

* Inscription/Connexion 📄
* Rechercher un titre 🔍
* Ecouter un titre 🔊
* Liker un titre ❤️
* Avoir sa propre playlist 💽

# Tutoriel d'utilisation

## Configuration requise

Audiora utilise :
- PHP
- Google Firebase
    - Cloud Firestore
    - Cloud Storage[^2]
- HTML/CSS
- Trello
- Vscode
    - PHP Server
    - Composer
    - Npm
- Javascript

>[!WARNING] 
>Notre Cloud firestore & Cloud Storage est en free-use donc risque d'être limité en taille.

[^2]: Le bucket est inacessible sans autorisations.

## Installation

Vous pouvez cloner le dépot en utilisant la commande suivante :
``` 
git clone https://github.com/MathieuAudibert/PHP-Renforcement
``` 

Vous aurez besoin de ces 2 extensions PHP afin de pouvoir assurer la connexion entre Firestore et l'app : 
https://pecl.php.net/package/gRPC/1.66.0/windows | https://pecl.php.net/package/protobuf/4.28.0/windows

>[!TIP]\
>Extractez les fichier et glissez les fichier **`php_grpc.dll`** & **`php_protobuf.dll`** dans le fichier **`C:\tools\php82\ext`**

Ensuite, dans votre fichier php.ini rajoutez n'importe ou ces 2 lignes: 
```
extension=php_grpc.dll
extension=php_protobuf.dll
```

Une fois cela fait, clonez le dépot et lancez les commandes suivantes dans le terminal : 
```
npm install
```

```
composer update 
```

Lancez maintenant l'app avec Live Server ou la commande suivante !

```bash
php -S localhost:7777 index.php
```

## Utilisation 

Le site est simple d'utilisation car il se divise en 2 experiences : 
- Utilisateur non inscrit
- Utilisateur inscrit

**Non Inscrit** :

**Inscrit** :

# Contact

mathieu.audibert@efrei.net | ismael.genet@efrei.net

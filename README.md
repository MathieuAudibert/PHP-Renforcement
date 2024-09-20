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
- [Vision](#vision)
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

>[!CAUTION]\
>Votre version de php peut différer de la notre ce qui pourrai expliquer les problemes liés a grpc & protobuf. Verifiez que votre version php (nous utilisons 8.2) soit inférieur a 8.2.

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

Notre site est non lucratif et a pour but de faire découvrir des artistes a nos utilisateurs et pour cela, nous limitons l'experience utilisateur (non inscrit) aux titres likés et les pages descriptives des artistes. 

Vous pouvez sans vous inscrire écouter, ressentir et vibrer sur la musique que nous vous proposons **GRATUITEMENT** ! 

<div style="text-align: center;">
  <img src="https://s11.gifyu.com/images/SApxB.gif"/>
</div>

Mais ce n'est pas tout, en effet, nous souhaitons que les artistes que nous mettons en avant gagne d'avantage d'auditeurs c'est pourquoi vous pouvez (toujours sans inscription requise) **TELECHARGER** la musique pour l'écouter hors ligne ou bien faire la propagande vous-meme !

<div style="text-align: center;">
    <img src="https://s11.gifyu.com/images/SApK1.gif"/>
</div>

Vous avez aussi accès a une page a propos qui détaille notre projet ! 🚀

**Inscrit** :

Dans un premier temps, notre application sécurise vos données en protégeant vos informations de connexion. 

Notre application offre de nombreux avantages supplémentaires pour les utilisateurs inscrits notamment le fait de liker des titres 

<div style="text-align: center;">
    <img src="https://s1.gifyu.com/images/SApNX.gif"/>
</div>

Nos utilisateurs ont aussi acccès a une brève description des artistes dans la page artistes afin d'en apprendre plus sur leurs nouveaux artistes préférés !
  
# Vision

Cette section regroupe ce que nous souhaitions mettre en place durant ce projet mais qui n'a malheuresement (faute de temps) pu aboutir : 
- Ajouter une github action pour formatter le CSS (bonus)
- Faire une page artiste avec tous nos artistes et un descriptif

# Contact

mathieu.audibert@efrei.net | ismael.genet@efrei.net

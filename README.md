# Audiora 🎵

Audiora est une plateforme de streaming musicale développé lors d'un projet de renforcement php.

Nous devions utiliser php (poo, design patterns), docker (image postgres) et n'importe quel outil agile (dans notre cas Trello).


# Fonctionnalités

- Inscription/Connexion 
- Rechercher un titre
- Ecouter un titre 
- Liker un titre 

# Tutoriel d'utilisation

## Configuration requise

Audiora utilise :
- PHP
- Google Firestore
- HTML/CSS

## Installation

Vous pouvez cloner le dépot en utilisant la commande suivante :
``` 
git clone https://github.com/MathieuAudibert/PHP-Renforcement
``` 

Vous aurez besoin de ces 2 extensions PHP afin de pouvoir assurer la connexion entre Firestore et l'app : 
https://pecl.php.net/package/gRPC/1.66.0/windows | https://pecl.php.net/package/gRPC/1.66.0/windows

>[!IMPORTANT]\
>Extractez les fichier et glissez les fichier `php_grpc.dll` & `php_protobuf.dll` dans le fichier `C:\tools\php82\ext`


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

Lancez maintenant l'app avec Live Server !

## Utilisation 


# Contact

mathieu.audibert@efrei.net | ismael.genet@efrei.net
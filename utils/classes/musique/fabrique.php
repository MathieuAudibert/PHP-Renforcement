<?php 

declare(strict_types=1);

require_once 'rap.php';
require_once 'jazz.php';
require_once 'classique.php';

class MusiqueFabrique {
    public static function createMusique($genre, $titre, $artiste, $album, $duree, $niveau_acces) {
        switch (strtolower($genre)) {
            case 'rap':
                return new Rap($titre, $artiste, $album, $duree, $niveau_acces);
                
            case 'jazz':
                return new Jazz($titre, $artiste, $album, $duree, $niveau_acces);
                
            case 'classique':
                return new Classique($titre, $artiste, $album, $duree, $niveau_acces);
                
            default:
                throw new InvalidArgumentException("Pas de genre de musique");
        }
    }
}

?>

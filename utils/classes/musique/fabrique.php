<?php 

declare(strict_types=1);

require_once __DIR__ . '\rap.php';
require_once __DIR__ . '\jazz.php';
require_once __DIR__ . '\classique.php';

class MusiqueFabrique {
    public static function createMusique(string $genre, string $titre, string $artiste, string $album, int $duree, int $niveau_acces): Musique{
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

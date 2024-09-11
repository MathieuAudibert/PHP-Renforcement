<?php 

declare(strict_types=1);

require_once __DIR__ . '\musique.php';

class MusiqueFabrique {
    public static function createMusique(string $titre, string $artiste, string $album, int $duree): Musique {
        return new Musique($titre, $artiste, $album, $duree);
    }
}

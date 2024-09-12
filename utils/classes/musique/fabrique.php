<?php 
declare(strict_types=1);

require_once __DIR__ . '/musique.php';
require_once __DIR__ . '/musiqueconcr.php';

class MusiqueFabrique {
    public static function createMusique($titre, $artiste, $album, $duree, $cover): Musique {
        return new MusiqueConcrete($titre, $artiste, $album, $duree, $cover);
    }
}

<?php

declare(strict_types=1);

require_once __DIR__ . '/musique.php';
require_once __DIR__ . '/musiqueconcr.php';

class MusiqueFabrique
{
    public static function createMusique($titre, $artiste, $album, $cover, $audioSrc): Musique
    {
        return new MusiqueConcrete($titre, $artiste, $album, $cover, $audioSrc);
    }
}

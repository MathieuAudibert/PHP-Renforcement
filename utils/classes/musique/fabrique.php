<?php

declare(strict_types=1);

require_once __DIR__ . '/musique.php';
require_once __DIR__ . '/musiqueconcr.php';

class MusiqueFabrique
{
    public static function createMusique(string $id, string $titre, string $artiste, string $album, string $cover, string $audioSrc): MusiqueConcrete
    {
        return new MusiqueConcrete($id, $titre, $artiste, $album, $cover, $audioSrc);
    }
}

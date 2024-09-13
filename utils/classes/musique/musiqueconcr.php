<?php

declare(strict_types=1);

require_once __DIR__ . '/musique.php';

class MusiqueConcrete extends Musique
{
    private $id;

    public function __construct(string $id, string $titre, string $artiste, string $album, string $cover, string $audioSrc)
    {
        parent::__construct($titre, $artiste, $album, $cover, $audioSrc);
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
?>

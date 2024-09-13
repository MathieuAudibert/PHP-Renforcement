<?php

declare(strict_types=1);

require_once __DIR__ . '/musique.php';

class MusiqueConcrete
{
    private $id;
    private $titre;
    private $artiste;
    private $album;
    private $cover;
    private $audioSrc;

    // Constructeur
    public function __construct(string $id, string $titre, string $artiste, string $album, string $cover, string $audioSrc)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->cover = $cover;
        $this->audioSrc = $audioSrc;
    }

    // Méthodes getters pour chaque propriété, y compris l'ID
    public function getId(): string
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getArtiste(): string
    {
        return $this->artiste;
    }

    public function getAlbum(): string
    {
        return $this->album;
    }

    public function getCover(): string
    {
        return $this->cover;
    }

    public function getAudioSrc(): string
    {
        return $this->audioSrc;
    }
}

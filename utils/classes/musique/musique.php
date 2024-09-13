<?php

declare(strict_types=1);

abstract class Musique
{
    protected $titre;
    protected $artiste;
    protected $album;
    protected $cover;
    protected $duree;
    protected $audioSrc; // Ajout de la propriété audioSrc

    public function __construct($titre, $artiste, $album, $duree, $cover, $audioSrc)
    {
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->duree = $duree;
        $this->cover = $cover;
        $this->audioSrc = $audioSrc; // Initialisation de la source audio
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getArtiste()
    {
        return $this->artiste;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getCover()
    {
        return $this->cover;
    }

    public function getAudioSrc()
    {
        return $this->audioSrc;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    public function setArtiste($artiste): void
    {
        $this->artiste = $artiste;
    }

    public function setAlbum($album): void
    {
        $this->album = $album;
    }

    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    public function setCover($cover): void
    {
        $this->cover = $cover;
    }

    public function setAudioSrc($audioSrc): void
    {
        $this->audioSrc = $audioSrc;
    }
}

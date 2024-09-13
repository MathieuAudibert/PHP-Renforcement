<?php

declare(strict_types=1);

abstract class Musique
{
    protected $titre;
    protected $artiste;
    protected $album;
    protected $cover;
    protected $audioSrc; 

    public function __construct($titre, $artiste, $album, $cover, $audioSrc)
    {
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->cover = $cover;
        $this->audioSrc = $audioSrc; 
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

    public function setCover($cover): void
    {
        $this->cover = $cover;
    }

    public function setAudioSrc($audioSrc): void
    {
        $this->audioSrc = $audioSrc;
    }
}

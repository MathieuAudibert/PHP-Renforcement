<?php 
declare(strict_types=1);


abstract class Musique {
    protected $titre;
    protected $artiste;
    protected $album;
    protected $cover;
    protected $duree; 

    public function __construct($titre, $artiste, $album, $duree, $cover) {
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->duree = $duree;
        $this->cover = $cover;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getArtiste() {
        return $this->artiste;
    }

    public function getAlbum() {
        return $this->album;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function getCover() {
        return $this->cover;
    }

    public function setTitre($titre): void{
        $this->titre = $titre;
    }

    public function setArtiste($artiste): void{
        $this->artiste = $artiste;
    }

    public function setAlbum($album): void{
        $this->album = $album;
    }

    public function setDuree($duree): void{
        $this->duree = $duree;
    }

    public function setCover($cover): void{
        $this->cover = $cover;
    }
}

?>

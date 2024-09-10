<?php 

declare(strict_types=1);

require_once('./utils/classes/musique/interfaces/interface.php');

abstract class Musique implements MusiqueInterface {
    protected $titre;
    protected $artiste;
    protected $album;
    protected $duree; 
    protected $genre;
    protected $niveau_acces;

    public function __construct($titre, $artiste, $album, $duree, $genre, $niveau_acces) {
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->duree = $duree;
        $this->genre = $genre;
        $this->niveau_acces = $niveau_acces;
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

    public function getGenre() {
        return $this->genre;
    }

    public function getNiveauAcces() {
        return $this->niveau_acces;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setArtiste($artiste) {
        $this->artiste = $artiste;
    }

    public function setAlbum($album) {
        $this->album = $album;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function setNiveauAcces($niveau_acces) {
        $this->niveau_acces = $niveau_acces;
    }

    abstract public function streamer($niveau_abonnement);
}

?>

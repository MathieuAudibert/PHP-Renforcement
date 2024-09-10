<?php 

declare(strict_types=1);

require_once __DIR__ . '\musique.php';

class Classique extends Musique {
    public function __construct($titre, $artiste, $album, $duree, $niveau_acces) {
        parent::__construct($titre, $artiste, $album, $duree, 'Classique', $niveau_acces);
    }

    public function streamer(int $niveau_abonnement): string {
        if ($niveau_abonnement >= $this->niveau_acces) {
            return "Lecture de '{$this->getTitre()}' par {$this->getArtiste()}.";
        } else {
            return "Vous n'avez pas le bon abonnement.";
        }
    }
}

?>

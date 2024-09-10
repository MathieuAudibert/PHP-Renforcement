<?php
require_once dirname(__DIR__, 2) . '\utils\bdd.php';

class MusiqueModel {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAllMusiques(): array {
        $query = 'SELECT * FROM musique'; 
        
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            $musiques = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $musiques[] = MusiqueFabrique::createMusique(
                    $row['genre'],
                    $row['titre'],
                    $row['artiste'],
                    $row['album'],
                    (int)$row['duree'],
                    (int)$row['niveau_acces']
                );
            }

            return $musiques;
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, __DIR__ . '/../logs/error.log');
            return [];
        }
    }
}

?>

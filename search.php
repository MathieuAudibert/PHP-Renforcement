<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/utils/bdd.php';
require_once __DIR__ . '/utils/classes/musique/fabrique.php';

header('Content-Type: application/json');

$searchTerm = $_GET['search'] ?? '';

function searchMusique(string $searchTerm): array
{
    $resultats = [];
    
    try {
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');
        $images = $musiqueCollection->documents(); 

        foreach ($images as $document) {
            $data = $document->data(); 

            if (isset($data['titre'], $data['artiste'], $data['album'], $data['cover'], $data['audioSrc'])) {
                $titre = strtolower($data['titre']);
                $artiste = strtolower($data['artiste']);
                $album = strtolower($data['album']);
                $searchTermLower = strtolower($searchTerm);

                if (
                    stripos($titre, $searchTermLower) !== false ||
                    stripos($artiste, $searchTermLower) !== false ||
                    stripos($album, $searchTermLower) !== false
                ) {
                    $resultats[] = [
                        'titre' => $data['titre'],
                        'artiste' => $data['artiste'],
                        'album' => $data['album'],
                        'cover' => $data['cover'],
                        'audioSrc' => $data['audioSrc']
                    ];
                }
            }
        }
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }

    return $resultats;
}

$resultats = searchMusique($searchTerm);

echo json_encode($resultats);

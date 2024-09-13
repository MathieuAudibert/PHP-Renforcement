<?php
// Activer l'affichage des erreurs pour déboguer (tu peux désactiver ces lignes en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure la connexion à la base de données et la fabrique des musiques
require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/musique/fabrique.php';

// Indiquer que la réponse sera en JSON
header('Content-Type: application/json');

// Récupérer le terme de recherche depuis l'URL (paramètre GET)
$searchTerm = $_GET['search'] ?? '';

echo json_encode(['searchTerm' => $searchTerm]); // Affiche le terme de recherche pour vérifier
exit;

// Fonction pour rechercher les musiques en fonction du terme
function searchMusique(string $searchTerm): array
{
    try {
        // Connexion à la base Firestore
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');
        $images = $musiqueCollection->documents(); // Récupérer tous les documents

        echo json_encode(['status' => 'connected', 'documents' => $images->size()]); // Vérifier la connexion et le nombre de documents
        exit;
    } catch (Exception $e) {
        // En cas d'erreur de connexion, retourner l'erreur
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }

    // Initialiser un tableau pour les résultats
    $resultats = [];
    foreach ($images as $document) {
        $data = $document->data(); // Récupérer les données du document

        // Vérifier que tous les champs nécessaires sont présents
        if (isset($data['titre'], $data['artiste'], $data['album'], $data['duree'], $data['cover'], $data['audioSrc'])) {
            // Appliquer un filtre en fonction du terme de recherche (par titre, artiste ou album)
            if (
                stripos($data['titre'], $searchTerm) !== false ||
                stripos($data['artiste'], $searchTerm) !== false ||
                stripos($data['album'], $searchTerm) !== false
            ) {
                // Ajouter les résultats filtrés dans le tableau
                $resultats[] = [
                    'titre' => $data['titre'],
                    'artiste' => $data['artiste'],
                    'album' => $data['album'],
                    'duree' => $data['duree'],
                    'cover' => $data['cover'],
                    'audioSrc' => $data['audioSrc']
                ];
            }
        }
    }

    // Retourner le tableau des résultats
    return $resultats;
}

// Appeler la fonction de recherche et stocker les résultats
$resultats = searchMusique($searchTerm);

// Toujours retourner un JSON valide, même si vide
echo json_encode($resultats);

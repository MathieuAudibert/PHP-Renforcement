<?php
// Active les messages d'erreurs pour déboguer
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Inclut la connexion à Firestore
require_once __DIR__ . '/../../utils/bdd.php';

// Récupère les données envoyées en POST
$input = json_decode(file_get_contents('php://input'), true);

// Vérifie si l'ID est présent dans les données
if (isset($input['id'])) {
    $musicId = $input['id'];

    try {
        // Connexion à Firestore
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');

        // Met à jour la musique pour définir 'liked' à true
        $musiqueCollection->document($musicId)->update([
            ['path' => 'liked', 'value' => true]
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Musique likée']);
    } catch (Exception $e) {
        // Retourne une réponse d'erreur avec le message détaillé
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Si l'ID est manquant dans la requête
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'ID de musique manquant']);
}

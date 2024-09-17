<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/users/fabrique.php';

function createUser()
{
    $nom = preg_match("/^[a-zA-Z\s'-]+$/", $_POST['nom']) ? $_POST['nom'] : null;
    $prenom = $_POST['prenom'] ?? null;
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? null;

    if (!$nom || !$prenom || !$email || !$password) {
        throw new Exception("Données invalides.");
    }

    $user = UserFabrique::createUser($nom, $prenom, $email, $password, []);

    $firestore = Bdd::getFirestoreClient();
    $userCollection = $firestore->collection('Users');
    $logsCollection = $firestore->collection('Logs');

    $userCollection->add([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $logsCollection->add([
        'Date' => new \DateTime('now'),
        'Action' => 'Ajout d utilisateur'
    ]);

    return $user;
}

function model_register()
{
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = createUser();
            header("Location: /login");
            exit(); 
        }
    } catch (Exception $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
        return null;
    }
}

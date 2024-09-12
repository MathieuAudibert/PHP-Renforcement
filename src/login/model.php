<?php
function model_login()
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            loginUser($_POST['email'], $_POST['password']);
        } else {
            echo 'Veuillez remplir tous les champs !';
        }
    }
}

require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/users/fabrique.php';

function loginUser($email, $password)
{
    $firestore = Bdd::getFirestoreClient();
    $userCollection = $firestore->collection('Users');
    $query = $userCollection->where('email', '=', $email);
    $documents = $query->documents();

    if ($documents->isEmpty()) {
        echo 'Email ou mot de passe incorrect.';
        return;
    }

    foreach ($documents as $document) {
        $user = $document->data();
        if (password_verify($password, $user['password'])) {
            // Démarrer une session et stocker les informations de l'utilisateur
            session_start();
            $_SESSION['user'] = $user;
            header('Location: /');
            exit();
        } else {
            echo 'Email ou mot de passe incorrect.';
        }
    }
}

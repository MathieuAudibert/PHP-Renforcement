<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once dirname(__DIR__, 2) . '/utils/classes/users.php';

class UserController {
    private UserModel $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function createUser(array $postData): void {
        $username = htmlspecialchars(trim($postData['username']));
        $email = filter_var(trim($postData['email']), FILTER_VALIDATE_EMAIL);
        $password = trim($postData['password']);
        $niveauacces = (int)$postData['niveauacces'];

        if ($email === false) {
            die('Email invalide.');
        }

        $user = new User($username, $email, $password, $niveauacces);

        if ($this->model->createUser($user)) {
            echo 'Compte bien crée';
        } else {
            echo 'Compte pas crée';
        }
    }
}
?>

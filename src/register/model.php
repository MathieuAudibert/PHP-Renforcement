<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/classes/users/users.php';
require_once dirname(__DIR__, 2) . '/utils/bdd.php';

class UserModel {
    private PDO $pdo;

    public function __construct() {
        $database = Database::getInstance();
        $this->pdo = $database->getConnection();
    }

    public function createUser(User $user): bool {
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password, niveauacces) VALUES (:username, :email, :password, :niveauacces)');
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':niveauacces', $user->niveauacces, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>

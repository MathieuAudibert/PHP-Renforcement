<?php 
declare(strict_types=1);

require_once __DIR__ . '/userconcr.php';
require_once __DIR__ . '/users.php';

class UserFabrique {
    public static function createUser($nom, $prenom, $email, $password, $titreLike): User {
        return new UserConcrete($nom, $prenom, $email, $password, $titreLike);
    }
}

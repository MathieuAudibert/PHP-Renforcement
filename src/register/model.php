<?php
declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/users/fabrique.php';

function createUser(){
    $nom = preg_match("/^[a-zA-Z\s'-]+$/", $_POST['nom']);
    $prenom = $_POST['prenom'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $user = UserFabrique::createUser($nom, $prenom, $email, $password, $titreLike);
    return $user;
}



function model_register() {
    
}


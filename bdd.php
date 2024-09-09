<?php

$host = '$host'; 
$port = 5432;
$dbname = '$bdd';
$user = '$user';
$password = '$passwd';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}
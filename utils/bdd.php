<?php

require_once('./cred.env');

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

// Ca marchera un jour 

try {
    $bdd = new PDO("pgsql:host={$host};dbname={$dbname}", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Pas connnecté: " . $e->getMessage(), 3, 'errors.log');
    die("Erreur de connection, details dans lse logs.");
}

return $bdd;
?>

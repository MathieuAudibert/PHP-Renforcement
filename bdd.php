<?php
require_once('./cred.env');

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

try {
    $bdd = new PDO("pgsql:host={$host};port=5432;dbname={$dbname},{$user},{$password}");
} catch (PDOException $e) {
    echo $e->getMessage();
    echo "Pas connecté ";
}
<<<<<<< HEAD
return $bdd;
=======

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $bdd;
?>
>>>>>>> 08e06420cd26f1a2e753c636cfb21c62d2819f8f

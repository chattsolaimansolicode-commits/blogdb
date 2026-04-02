<?php
$host = 'localhost';
$dbname = 'gestion_produits';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "errur" . $e->getMessage();
}
?>
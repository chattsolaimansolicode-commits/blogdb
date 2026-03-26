<?php

//Requête préparée avec paramètres nommés
require 'connexion.php';

$stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
$stmt->execute([
    'nom' => 'Alice',
    'email' => 'alice@test.com'
]);
echo "Utilisateur ajouté.";

//Requête préparée avec bindParam

$nom = 'Bob';
$email = 'bob@test.com';
$stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':email', $email);
$stmt->execute();

//Requête SELECT sécurisée

$stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email");
$stmt->execute(['email' => 'alice@test.com']);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Nom : " . $user['nom'];

// Paramètres anonymes

$stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE id = ?");
$stmt->execute([1]);






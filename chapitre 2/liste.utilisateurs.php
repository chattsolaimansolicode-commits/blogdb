<?php
require 'connexion.php'; // ← imports $pdo from connexion.php

try {
    // Step 1 — write the query
    $sql = "SELECT * FROM Utilisateur";

    // Step 2 — execute it with query()
    $stmt = $pdo->query($sql);

    // Step 3 — fetch ALL rows as associative array
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 4 — display each row
    foreach ($utilisateurs as $user) {
        echo "ID : "    . $user['id']    . "<br>";
        echo "Nom : "   . $user['nom']   . "<br>";
        echo "Email : " . $user['email'] . "<br>";
        echo "---<br>";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
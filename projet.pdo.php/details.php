<?php

require 'config.php';

// check if id exists in URL
if (!isset($_GET['id'])) {
    die('ID non valide');
}
$id = (int) $_GET["id"];

// prepare statement
$stmt = $pdo->prepare("SELECT * FROM Produit WHERE id_Produit = ?");
$stmt->execute([$id]);

$produit = $stmt->fetch(PDO::FETCH_ASSOC);
// valide the product
if (!$produit) {
    die("Produit non trouvé");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
</head>

<body>
    <h1><?= htmlspecialchars($produit["nom"]) ?></h1>
    <p>Prix : <?= htmlspecialchars($produit["prix"]) ?> DH</p>
    <p>Description : <?= htmlspecialchars($produit["description"]) ?></p>
    <p>Catégorie : <?= htmlspecialchars($produit["categorie"]) ?></p>
    <a href="catalogue.php">Retour au catalogue</a>
</body>

</html>
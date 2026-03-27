<?php
// connect
require 'config.php';

// type the query
$stmt = $pdo->query("SELECT * FROM Produit");

// fetch all as associative array
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
</head>

<body>
    <h1>Catalogue</h1>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) : ?>
        <p>Produit ajouté avec succès !</p>
    <?php endif; ?>

    <!-- go to add page -->
    <a href="ajouter-produit.php">Ajouter un produit</a>

    <!-- display products -->
    <?php foreach ($produits as $p) : ?>
        <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
            <h4><?= htmlspecialchars($p['nom']) ?></h4>
            <p><?= htmlspecialchars($p['prix']) ?> DH</p>
            <a href="details.php?id=<?= $p['id_Produit'] ?>">Details</a>
        </div>
    <?php endforeach; ?>
</body>

</html>
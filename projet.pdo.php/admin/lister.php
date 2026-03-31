<?php
require '../config.php';

// Récupérer tous les produits
$stmt = $pdo->query("SELECT * FROM Produit");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Total produits
$total = $pdo->query("SELECT COUNT(*) FROM Produit")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <p>Total produits : <?= $total ?></p>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $p): ?>
                <tr>
                    <td><?= $p['id_Produit'] ?></td>
                    <td><?= htmlspecialchars($p['nom']) ?></td>
                    <td><?= number_format($p['prix'], 2, ',', ' ') ?> DH</td>
                    <td><?= htmlspecialchars($p['categorie']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $p['id_Produit'] ?>">Modifier</a> |
                        <a href="supprimer.php?id=<?= $p['id_Produit'] ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">⬅ Retour</a>
</body>
</html>
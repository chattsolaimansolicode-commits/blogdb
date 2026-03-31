<?php
require 'config.php';

$erreur = "";
$nom = $prix = $description = $categorie = '';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    // clean all inputs
    $nom         = htmlspecialchars(trim($_POST['nom']));
    $prix        = trim($_POST['prix']);
    $description = htmlspecialchars(trim($_POST['description']));
    $categorie   = htmlspecialchars(trim($_POST['categorie']));

    // validation
    if(empty($nom) || empty($prix) || empty($description) || empty($categorie)){
        $erreur = "Veuillez remplir tous les champs.";
    } elseif(!is_numeric($prix) || $prix <= 0){
        $erreur = "Le prix doit être un nombre positif.";
    } else {
        $stmt = $pdo->prepare(
            "INSERT INTO Produit (nom, prix, description, categorie) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$nom, $prix, $description, $categorie]);

        header("Location: catalogue.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>

<h1>Ajouter un produit</h1>

<?php if($erreur): ?>
    <p style="color:red;"><?= $erreur ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="nom" 
           placeholder="Nom" 
           value="<?= $nom ?>"><br><br>

    <input type="number" step="0.01" name="prix" 
           placeholder="Prix" 
           value="<?= $prix ?>"><br><br>

    <textarea name="description" 
              placeholder="Description"><?= $description ?></textarea><br><br>

    <input type="text" name="categorie" 
           placeholder="Catégorie" 
           value="<?= $categorie ?>"><br><br>

    <button type="submit">Ajouter</button>
</form>

<a href="catalogue.php">⬅ Retour</a>

</body>
</html>
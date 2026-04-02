<?php
require 'config.php';

$errur = '';
$nom = $prix = $description = $categorie = '';

if($_SERVER["REQUEST_METHOD"]==="POST"){
     $nom         = htmlspecialchars(trim($_POST['nom']));
    $prix        = trim($_POST['prix']);
    $description = htmlspecialchars(trim($_POST['description']));
    $categorie   = htmlspecialchars(trim($_POST['categorie']));

    //validation
    if(empty($nom)||empty($prix) || empty($description)||empty($categorie)){
        $errur = "remplir tout les champs";
    }elseif(!is_numeric($prix) || $prix <= 0){
        $errur = "le prix doit etre un nombre positif";
    }else{
        $stmt = $pdo->prepare("INSERT INTO Produit (nom,prix,description,categorie)VALUES(?,?,?,?)");
        $stmt->execute([$nom,$prix,$description,$categorie]);
        header("location:catalogue.php?success=1");
        exit();

    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page insertion</title>
</head>
<body>
    <h1>ajouter un produit</h1>

    <form method="POST"><br><br>
        <input type="text" name="nom" placeholder="Nom" value="<?= $nom ?>"><br><br>
        <input type="number" name="prix" placeholder="Prix" value="<?= $prix ?>"><br><br>
        <textarea name="description" ><?= $description ?></textarea><br><br>
        <input type="text" name="categorie" placeholder="Categorie" value="<?= $categorie ?>"><br><br>
        <button type="submit"> ajouter </button>
      
    </form>
    <a href="catalogue.php">retour au catalogue</a>
    
</body>
</html>















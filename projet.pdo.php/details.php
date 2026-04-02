<?php
require 'config.php';

if(!isset($_GET["id"])){
      die("id non valide");

}
  

$id = (int) $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM Produit WHERE id_produit = ?");
$stmt->execute(["$id"]);

$produit = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$produit){
    die("produit non trouve");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?=  htmlspecialchars($produit) ?> ?></h1>
    <p></p>
    <p></p>
    <p></p>
    
</body>
</html>
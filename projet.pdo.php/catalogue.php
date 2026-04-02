<?php

require 'config.php';

$stmt = $pdo->query("SELECT * FROM Produit");
$produit = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogue</title>
</head>
<body>
    <h1>catalogue page</h1>

    <?php  if(isset($_GET["success"])&&$_GET["success"]== 1) :?>
        <p style="border: 1px;color:green">ajouter avec success</p>
        <?php     endif;       ?>
        <a href="ajouter-produit.php">ajouter un produit</a>

        <?php     foreach($produit as $p):      ?>
            <div style="border: 1; color:blue; padding:10px; margin:10px 0">
                <h4><?=  htmlspecialchars($p["nom"]) ?></h4>
                <p><?= htmlspecialchars($p["prix"]) ?>DH</p>
            </div>
            <a href="details.php?=<?= $p["id_produit"] ?>"></a>
    
</body>
</html>












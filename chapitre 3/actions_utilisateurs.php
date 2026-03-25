<?php
require 'connexion.php';
//insert method

try{
    $stmt = $pdo->prepare("INSERT INTO Utilisateurs(nom,email)VALUES(:nom, :email)");
    $stmt->execute([
        "nom"=>"solaiman",
        "email"=>"solaiman@gmail.com"
    ]);
    echo "utilisateur ajoute avec succes";
}catch(PDOException $th){
    echo "errur" . $th->getMessage();

}
// update method
$stmt = $pdo->prepare("UPDATE Utulisateurs SET email = :email  where id = :id");
$stmt->execute([
    'email' => 'solaimanasasasa@imm',
    'id' => 2

]);
echo "utulisateur mis a jour.";

//supression method

$stmt = $pdo ->prepare("DELETE FROM Utilisateurs  WHERE id = :id");
$stmt ->execute([
    'id' => 3
     
    ]);

echo "Utulisateur suprime";





?>
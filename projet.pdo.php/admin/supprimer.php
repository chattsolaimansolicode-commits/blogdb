<?php
require '../config.php';

if (!isset($_GET['id'])) exit("ID non valide");
$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM Produit WHERE id_Produit = ?");
$stmt->execute([$id]);

header("Location: lister.php");
exit();
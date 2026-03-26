
<?php
require 'connexion.php';
try {
  $pdo->query("SELECT * FROM table_inexistante");
} catch (PDOException $e) {
  echo "Erreur SQL : " . $e->getMessage();
}

?>
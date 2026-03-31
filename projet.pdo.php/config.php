<?php

// data parametre
$host = 'localhost';
$dbname = 'gestion_produits';
$user = 'root';
$password = '';

// data source name
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

// create a new pdo
try{
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// if not excest display :
}catch(PDOException $e){
    file_put_contents('errur/log',$e->getMessage(),PHP_EOL,FILE_APPEND);
    echo "connexion failed call administration";

}












?>
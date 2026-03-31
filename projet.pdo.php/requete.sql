CREATE DATABASE gestion_produits;
USE gestion_produits;

CREATE TABLE Produit (
    id_Produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    description TEXT ,
    categorie VARCHAR(100)

);

DESCRIBE Produit;
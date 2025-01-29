<?php
$host = 'localhost';
$user = 'root'; 
$password = '';
$database = 'ecommerce';

try {
    $pdo = new PDO("mysql:host=$host", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Créer la base de données si elle n'existe pas
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // Se connecter à la base nouvellement créée
    $pdo->exec("USE $database");

    // Créer la table produits si elle n'existe pas
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        productID INT AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(255) NOT NULL,
        product_description TEXT NOT NULL,
        product_price DECIMAL(10, 2) NOT NULL,
        product_image VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "<p> Base de données et table créées avec succès ! </p>";
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

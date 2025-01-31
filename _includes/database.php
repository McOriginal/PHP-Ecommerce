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

    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ");

    $pdo->exec("CREATE TABLE IF NOT EXISTS cart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (product_id) REFERENCES products(productID)

    )");

    $successMessage = "Base de données et table créées avec succès !";
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!-- <div id="message" class="alert alert-success text-center">
    <?php htmlspecialchars($successMessage) ?>
</div> -->

<script>
    setTimeout(() => {
        let msg = document.getElementById("message");
        if (msg) {
            msg.style.opacity = "0";
            setTimeout(() => msg.style.display = "none", 500);
        }
    }, 3000); 
</script>

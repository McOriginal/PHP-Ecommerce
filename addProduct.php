<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $productImage = $_FILES['product_image'];

    // Vérification des champs requis
    if (!empty($productName) && !empty($productDescription) && !empty($productPrice) && !empty($productImage['name'])) {
        // Gestion de l'image
        $targetDir = __DIR__ . "/uploads/"; // Dossier absolu pour éviter les erreurs
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Crée le dossier si inexistant
}

$targetFile = $targetDir . basename($productImage['name']);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

if (in_array($imageFileType, $allowedTypes)) {
    // Déplacement de l'image
    if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
        echo "Image téléchargée avec succès.";
        // Insertion dans la base de données
        $stmt = $pdo->prepare("INSERT INTO products (product_name, product_description, product_price, product_image) 
                                VALUES (:product_name, :product_description, :product_price, :product_image)");
        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':product_description', $productDescription);
        $stmt->bindParam(':product_price', $productPrice);
        $stmt->bindParam(':product_image', $targetFile);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Produit ajouté avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout du produit.</p>";
        }
    } else {
        echo "<p style='color: red;'>Erreur lors du téléchargement de l'image.</p>";
    }
        } else {
            echo "<p style='color: red;'>Type de fichier non valide. Seuls JPG, JPEG, PNG et GIF sont autorisés.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tous les champs sont obligatoires.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="addProduct.css">
    <title>Ajouter le produit</title>

</head>
<body>

<div class="auth-container">
    <form class="auth-form" action="" method="POST" enctype="multipart/form-data">
        <h1>Ajouter un Produit</h1>
        <div class="input-group">
            <i class="fas fa-tag"></i>
            <input type="text" name="product_name" placeholder="Nom du produit" required>
        </div>
        <div class="input-group">
            <i class="fas fa-align-left"></i>
            <textarea name="product_description" placeholder="Description du produit" rows="3" required></textarea>
        </div>
        <div class="input-group">
            <i class="fas fa-dollar-sign"></i>
            <input type="number" name="product_price" placeholder="Prix" step="0.01" required>
        </div>
        <div class="input-group">
            <i class="fas fa-image"></i>
            <input type="file" name="product_image" accept="image/*" required>
        </div>
        <button type="submit" class="btn" name="add_product">Ajouter Produit</button>
    </form>
</div>


</body>
</html>
<?php
$title = "Ajouter des produits";

// Appel de la fonction Link CSS:
css_link("assets/css/addProduct.css");


// Traitement de la logique :
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $productImage = $_FILES['product_image'];

    // Vérification des champs requis
    if (!empty($productName) && !empty($productDescription) && !empty($productPrice) && !empty($productImage['name'])) {
        // Gestion de l'image
        $targetDir = "../assets/uploads/";// Dossier absolu pour éviter les erreurs
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
                    echo "<div class='alert alert-success'>Produit ajouté avec succès !</div>";
                    header("Location: index.php?page=shop");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Erreur lors de l'ajout du produit.</div>";
                }

            } else {
                echo "<div class='alert alert-danger'>Erreur lors du téléchargement de l'image.</div>";
            }

        } else {
            echo "<div class='alert alert-danger'>Type de fichier non valide. Seuls JPG, JPEG, PNG et GIF sont autorisés.</div>";
        }

    } else {
        echo "<div class='alert alert-danger'>Tous les champs sont obligatoires.</div>";
    }
}
?>


<div class="auth-container">
    <form class="auth-form" action="" method="POST" enctype="multipart/form-data">
        <h1 class="add">Ajouter un Produit</h1>
        <div class="input-group">
            <i class="fas fa-tag"></i>
            <input type="text" class="form-control" name="product_name" placeholder="Nom du produit" required>
        </div>
        <div class="input-group">
            <i class="fas fa-align-left"></i>
            <textarea name="product_description" class="form-control" placeholder="Description du produit" rows="3" required></textarea>
        </div>
        <div class="input-group">
            <i class="fas fa-dollar-sign"></i>
            <input type="number" name="product_price" class="form-control" placeholder="Prix" step="0.01" required>
        </div>
        <div class="input-group">
            <i class="fas fa-image"></i>
            <input type="file" name="product_image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary" name="add_product">Ajouter Produit</button>
    </form>
</div>


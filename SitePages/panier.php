
<div class="container">
   

    <?php
    if (empty($_SESSION['panier'])) {
        echo "<div class='alert alert-warning text-center mt-5'>Votre panier est vide.</div>";
    } else {
        $total_general = 0;
        echo "<h3 class='text-center mt-5 fw-bold'>🛒 Votre Panier</h3>";
        echo "<ul class='list-group'>";

        foreach ($_SESSION['panier'] as $id => $quantite) {
            // Récupérer les infos du produit
            $stmt = $pdo->prepare("SELECT product_name, product_description, product_price, product_image FROM products WHERE productID = :id");
            $stmt->execute(['id' => $id]);
            $produit = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($produit) {
                $nom = $produit['product_name'];
                $designation = $produit['product_description'];
                $prix = $produit['product_price'];
                $image = $produit['product_image'];

                $total = $prix * $quantite;
                $total_general += $total;

                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                        <img src='$image' alt='$nom' class='img-thumbnail' style='width: 80px; height: 80px; object-fit: cover;'>
                        <div class='ms-2 me-auto'>
                            <h6 class='my-0'>$nom</h6>
                            <small class='text-muted'>Prix: $prix F</small><br>
                            <small class='text-muted'>Quantité: $quantite</small>
                        </div>
                        <span class='badge bg-primary rounded-pill'>$total F</span>
                        <a href='index.php?page=cart&action=remove&id=$id' class='btn btn-danger btn-sm ms-3'>❌ Supprimer</a>
                    </li>";
            }
        }

        echo "</ul>";

        // Afficher le total général
        echo "<div class='mt-3 text-end'>
                <h5>Total: <strong>$total_general F</strong></h5>
                <a href='index.php?page=checkout' class='btn btn-success'>🛍️ Commander</a>
            </div>";
    }
?>

</div>
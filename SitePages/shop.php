<?php 

    // session_start();

    $title = "Boutique du site";
    // Récupérer les produits depuis la base de données
    $query = $pdo->query("SELECT * FROM products");
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<style>
    .card{
    box-shadow: 0 6px 0px rgba(0, 0, 0, .86);
    background-color: white !important;
    border: none;
}
</style>

<div class="container-fluid">
    <div class="row">
        <section id="produits" class="section">
            <h2>Nos Produits</h2>
            <div class="product-list">


            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($product['product_image'])?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['product_description']); ?></p>
                        <p><?php echo htmlspecialchars($product['product_price']); ?> F</p>
                        <!-- <a href="index.php?page=home&action=add&id=1"><button class="btn">Ajouter au panier</button></a> -->
                        <a href="../../PHP-Ecommerce/index.php?page=add_to_cart&id=<?= $product['productID'] ?>" class="btn btn-primary">🛒 Ajouter au panier</a>

                        
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun produit disponible pour le moment.</p>
            <?php endif; ?>
                
            </div>
        </section>

        
       
    </div>

</div>
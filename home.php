
<?php require_once 'header.php' ;
require_once 'pdo.php';

// Récupérer les produits depuis la base de données
$query = $pdo->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<header>
        <nav class="navbar">
            <div class="logo">MyShop</div>
            <ul class="nav-links">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#apropos">À propos</a></li>
                <li><a href="#produits">Produits</a></li>
                <li><a href="addProduct.php">Ajoute des produits</a></li>
            </ul>
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>
        </nav>
    </header>

    <section id="accueil" class="section">
        <div class="content">
            <h1>Bienvenue sur MyShop</h1>
            <p>Découvrez nos produits de qualité et nos offres exceptionnelles.</p>
        </div>
    </section>

    <section id="apropos" class="section">
        <div class="content">
            <h2>À propos de nous</h2>
            <p>MyShop est votre destination pour des produits de qualité, adaptés à vos besoins. Nous nous engageons à offrir une expérience client exceptionnelle.</p>
        </div>
    </section>

    <section id="produits" class="section">
        <h2>Nos Produits</h2>
        <div class="product-list">


        <?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($product['product_image'])?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
            <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
            <p><?php echo htmlspecialchars($product['product_description']); ?></p>
            <p><?php echo htmlspecialchars($product['product_price']); ?> €</p>
            <button class="btn">Ajouter au panier</button>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun produit disponible pour le moment.</p>
<?php endif; ?>
            
        </div>
    </section>

    <footer>
        <p>&copy; 2025 MyShop. Tous droits réservés.</p>
    </footer>
</body>
</html>
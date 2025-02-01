<?php 

    // session_start();

    $title = "Boutique du site";
    // Récupérer les produits depuis la base de données
    $query = $pdo->query("SELECT * FROM products");
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    // ajout du lien css
    css_link("./assets/css/shop.css");

?>

<style>
    .card{
        box-shadow: 0 6px 0px rgba(0, 0, 0, .86);
        background-color: white !important;
        border: none;
    }
    
    .product-card:hover {
        transform: scale(1.05);
        transition: 0.3s;
    }
</style>

<!-- Bannière du site -->
<div class="row header-conteneur bg-white">
    <div class="image col-sm-6">
        <img src="./assets/images/food-header.jpeg" alt="Image d'accueil" class="img-fluid img-header w-100">
    </div>
    <div class="col-sm-6 header-content">
        <h1 class="display-5">Boutique du site</h1>        
        <p class="lead">Retrouvez nos meilleurs produits de la région. N'hésitez pas à visiter nos pages de produit pour découvrir nos offres spéciales.</p>
        <p class="link-header"><a href="index.php?page=home" class="btn btn-primary link1">Voir tous les produits</a> <a href="index.php?page=login" class="btn btn-primary ml-3 link2">Nos offres spéciales</a></p>
    </div>
    
    
</div>

<!-- Section Produits -->
<section id="produits" class="container my-5">
       
    <div class="row mt-3 mb-5">
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/orange.jpeg" class="card-img-top" alt="Produit 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/ail.jpeg" class="card-img-top" alt="Produit 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/pomme.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/oignon.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 4</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row mt-3 mb-5">
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/oignon_red.jpeg" class="card-img-top" alt="Produit 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/orange_frais.jpeg" class="card-img-top" alt="Produit 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/pomme.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/poivres.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Section des produits -->
<section id="produits" class="section">
    <h2 class="fruits">Fruits et légumes</h2>
    <div class="product-list">

        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="card product-card">
                    <img src="<?php echo htmlspecialchars($product['product_image'])?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                    <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['product_description']); ?></p>
                    <p><?php echo htmlspecialchars($product['product_price']); ?> €</p>
                    <!-- <button class="btn">Ajouter au panier</button> -->
                    <a href="index.php?page=home&action=add&id=1"><button class="btn">Ajouter au panier</button></a>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun produit disponible pour le moment.</p>
        <?php endif; ?>
        
    </div>
</section>

<!-- Section Produits -->
<section id="produits" class="container my-5">
    <h2 class="fruits text-center">Offres Spéciales</h2>
    <div class="row mt-3 mb-5">
        
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/orange.jpeg" class="card-img-top" alt="Produit 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/ail.jpeg" class="card-img-top" alt="Produit 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/pomme.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/oignon.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 4</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row mt-3 mb-5">
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/oignon_red.jpeg" class="card-img-top" alt="Produit 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/orange_frais.jpeg" class="card-img-top" alt="Produit 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/pomme.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./assets/images/poivres.jpeg" class="card-img-top" alt="Produit 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description du produit.</p>
                    <a href="#" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
    </div>
    
</section>
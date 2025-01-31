
<?php 
$title = "Home du site";

// Récupérer les produits depuis la base de données
$query = $pdo->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

css_link("./assets/css/home.css")

?>
<div class="container-fluid mt-5">
    <style>
        .navbar {
            transition: all 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
        .carousel-control-prev, .carousel-control-next{
            color: #4B164C !important;
        }
    </style>

    <div class="row header-conteneur  bg-white">
        <div class="col-sm-6 header-content">
            <h1 class="display-4">Bienvenue à Kilakodon</h1>
            <p class="lead">Découvrez une large gamme de produits soigneusement sélectionnés pour répondre à vos besoins et envies. Profitez d'une expérience d'achat simple, rapide et sécurisée.</p>
            
        </div>
        <div class="image col-sm-6">
            <img src="./assets/images/aliments.jpeg" alt="Image d'accueil" class="img-fluid">
        </div>
    </div>


    <!-- Section Produits -->
    <section id="produits" class="container my-5">
       
        <div class="row mt-3 mb-5">
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/aliments.jpeg" class="card-img-top" alt="Produit 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 1</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/aliments.jpeg" class="card-img-top" alt="Produit 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 2</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/aliments.jpeg" class="card-img-top" alt="Produit 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 3</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/fruits.jpeg" class="card-img-top" alt="Produit 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 1</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/fruits.jpeg" class="card-img-top" alt="Produit 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 2</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="./assets/images/fruits.jpeg" class="card-img-top" alt="Produit 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produit 3</h5>
                        <p class="card-text">Description du produit.</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

     <!-- Carousel -->
    
    <div id="carouselExample" class="carousel slide container-fluid" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active d-flex">
                <img src="./assets/images/food.jpeg" class="d-block w-50" alt="image-carrousel">
                <img src="./assets/images/food-2.jpeg" class="d-block w-50" alt="image-carrousel">

            </div>
            <div class="carousel-item">
                <img src="./assets/images/food-3.jpeg" class="d-block w-50" alt="image-carrousel">

            </div>
            <div class="carousel-item">
                <img src="./assets/images/food-5.jpeg" class="d-block w-50" alt="image-carrousel">

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>


    <div class="row header-conteneur mt-5 bg-white">
        <div class="col-sm-4 header-content">
            <img src="./assets/images/fruits.jpeg" alt="" srcset="">
        </div>
        <div class="image col-sm-4">
            <img src="./assets/images/raisin.jpeg" alt="Image d'accueil" class="img-fluid">
        </div>
        <div class="image col-sm-4">
            <img src="./assets/images/aliments.jpeg" alt="Image d'accueil" class="img-fluid">
        </div>
    </div>

    

    <section id="produits" class="section">
        <!-- <h2>Nos Produits</h2> -->
        <div class="product-list">

            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="card">
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

        <!-- Témoignages -->
    <section id="temoignages" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Témoignages</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="text-center">
                        <p>"Super boutique, service impeccable !"</p>
                        <small>- Client satisfait</small>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center">
                        <p>"Produits de qualité, je recommande !"</p>
                        <small>- Client heureux</small>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

</div>
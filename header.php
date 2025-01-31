<?php 

// Vérification du rôle d'utilisateur
$user_logged_in = isset($_SESSION['user']);
$user_role = $user_logged_in ? $_SESSION['user']['role'] : '';


$page = $_GET['page'] ?? 'home';
$titles = [
    'home' => 'Bienvenue sur notre boutique',
    'about' => 'A Propos de nous',
    'addProduct' => 'Ajouter des produits',
    'panier' => 'Votre Panier',
    'login' => 'Se connecter'

];
$title = $titles[$page] ?? 'Boutique en ligne';

require "_includes/_head.php"; 
require_once "functions.php";

?>

<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-image-top">
            <a class="navbar-brand" href="logo">Kilakodon Sugu</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?= nav_item("home", "Home") ?>
                <?= nav_item("about", "A Propos") ?>
                <?= nav_item("shop", "Boutique") ?>
                
                <?php if($user_logged_in): ?>
                    <?= nav_item("panier", "Panier") ?>
                    <?php if ($user_role === 'admin'): ?>
                        <?= nav_item("addProduct", "Ajouter des produits") ?>
                    <?php endif; ?>
                    <?= nav_item("logout", "Se deconnecter") ?>


                <?php else: ?>
                    <?= nav_item("login", "Se connecter") ?>                    
                <?php endif; ?>


            </ul>
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>&nbsp;&nbsp;
            </div>

            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->

        </div>
    </div>
</nav>
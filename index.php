
<?php 
session_start();

$title = "Home du site";
require_once "_includes/database.php";
require_once "header.php";
require_once "functions.php";

require "Autoloader.php";
Autoload::register();


// Récupérer la page demandée dans l'URL (ex: grenfad.com/?page=contact)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Sécuriser le nom du fichier (évite l'exécution de fichiers non autorisés)
$pages_disponibles = ['home', 'about', 'shop', 'addProduct', 'inscription', 'login', 'panier'];
$page = in_array($page, $pages_disponibles) ? $page : 'erreur';


// Récupération de la page en cours
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Initialiser le panier si vide
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajouter un produit au panier
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Vérifier si le produit est déjà dans le panier
    if (!isset($_SESSION['panier'][$productId])) {
        $_SESSION['panier'][$productId] = 1; // 1 quantité par défaut
    } else {
        $_SESSION['panier'][$productId]++; // Augmenter la quantité
    }

    // Rediriger vers la boutique après l'ajout
    header("Location: index.php?page=panier");
    exit();
}


// On vérifie si l'utilisateur à fait l'action de remove
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    if (isset($_SESSION['panier'][$productId])) {
        unset($_SESSION['panier'][$productId]); // Supprimer l'élément du panier
    }

    // Rediriger vers la page panier
    header("Location: index.php?page=panier");
    exit();
}


?>


<!-- Inclusion de la page demandée -->
<?php include "SitePages/$page.php"; ?>





<br>
<?php require 'footer.php';  ?>
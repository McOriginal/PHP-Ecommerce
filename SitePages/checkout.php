<?php 
// Si la session n'et pas défini lancer la session automatiquement


// Cette logique me permet de vérifier la présence de l'utilisateur.
if (!empty($_SESSION['panier'])) {
    $user_id = $_SESSION['user']['id'] ?? null; // Récupère l'ID utilisateur
    
    if (!isset($user_id)) {
        die("<div class='body'>
                <div class='container alert alert-danger my-5'>Erreur : Vous devez être connecté pour passer une commande.</div>
            </div>");
    }

    $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :produit_id, :quantite)");

    foreach ($_SESSION['panier'] as $id => $quantite) {
        $stmt->execute([
            'user_id' => $user_id,  // Ajout de l'ID utilisateur
            'produit_id' => $id,
            'quantite' => $quantite
        ]);
    }

    // Vider le panier après la commande
    $_SESSION['panier'] = [];

    echo "<div class='body'>
    <div class='container alert alert-success mt-5'>Commande enregistrée avec succès !</div>
    </div>";
} else {
    echo "<div class='body'>
    <div class='container alert alert-danger mt-5'>Votre panier est vide.</div>
    </div>";
}


?>
<style>
    .body{
        height: 100vh;
    }
</style>
<?php 


if (!empty($_SESSION['panier'])) {
    $stmt = $pdo->prepare("INSERT INTO commandes (produit_id, quantite) VALUES (:produit_id, :quantite)");

    foreach ($_SESSION['panier'] as $id => $quantite) {
        $stmt->execute([
            'produit_id' => $id,
            'quantite' => $quantite
        ]);
    }

    // Vider le panier après la commande
    $_SESSION['panier'] = [];

    echo "<p>Commande enregistrée avec succès !</p>";
}
else{
    echo "<p>Votre panier est vide.</p>";
}



?>
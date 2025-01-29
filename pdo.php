<!-- Connexion à la base de données MySQL  -->


<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
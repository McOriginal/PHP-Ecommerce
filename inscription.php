<?php 
require_once 'header.php' ;

//  Création de la table si ça n'existe pas 

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if(isset($_POST['envoyer'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 // Hachage du mot de passe
 $password_hashed = password_hash($password, PASSWORD_DEFAULT);

//  Vérification et Insertion des données du formulaire


    if(!empty($username) && !empty(filter_var($email, FILTER_VALIDATE_EMAIL)) && !empty($password)){

$sql = ' CREATE TABLE IF NOT EXISTS users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 
)';


$pdo->exec($sql);


// $insertion = "INSERT INTO users(username,email,password) VALUES(:username,:email,:password)";
 $insertion= $pdo->prepare('INSERT INTO users(username,email,password) VALUES(:username,:email,:password)');

$insertion->bindvalue(':username', $username);
$insertion->bindvalue(':email', $email);
$insertion->bindvalue(':password', $password_hashed);

$insertion->execute();

echo "<script> alerte(Inscription réussie!) </script>";

header("Location: login.php");
exit();


}

else{
    echo "Veuillez remplir tous les champs.";
}

}



?>




<div class="auth-container">
        <form class="auth-form" action="" method="POST">
            <h1>Sign Up</h1>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button  type="submit" class="btn" name="envoyer"> S'inscrire</button>
            <p>Vous avez déjà un compte? <a href="login.php">Se connecter</a></p>
        </form>
    </div>


</body>
</html>
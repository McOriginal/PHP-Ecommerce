<?php 
require_once 'header.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if (isset($_POST['envoyer'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des champs vides
    if (empty($email) || empty($password)) {
        echo "<p style='color: red;'>Veuillez remplir tous les champs.</p>";
        exit;
    }

    // Recherche de l'utilisateur
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            // Démarrage de la session
            session_start();
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];

            // Redirection après connexion réussie
            header('Location: home.php');
            exit;
        } else {
            echo "<p style='color: red;'>Mot de passe incorrect.</p>";
        }
    } else {
        echo "<p style='color: red;'>Email inconnu.</p>";
    }
}
?>

<div class="auth-container">
    <form class="auth-form" action="" method="POST">
        <h1>Login</h1>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn" name="envoyer">Se connecter</button>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
    </form>
</div>
</body>
</html>

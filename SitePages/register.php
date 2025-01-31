<?php
$success_message = null;
$error_message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = $_POST['role']; // Ajout du rôle

    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        $success_message = "Utilisateur enregistré avec succès";
        header('Location: index.php?page=login');
        exit;
    } else {
        $error_message = "Erreur lors de la creation de votre compte";
    }
}
?>

<div class="container">
    <div class="row">

        <?php 
        if(isset($error_message)): ?>
            <div id="message" class="alert alert-danger text-center mt-3">
                <?= htmlspecialchars($error_message) ?>
            </div> 
        <?php elseif(isset($success_message)): ?>
            <div id="message" class="alert alert-success text-center mt-3">
                <?= htmlspecialchars($success_message) ?>
            </div>
        <?php endif ?>

    </div>
    <style>
        .container{
            height: auto !important;
        }
        .navbar, footer{
            display: none;
        }
    </style>

        <div class="auth-container">
            <form class="auth-form" action="" method="POST">
                <h1>Formulaire d'inscription</h1>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required class="form-control">
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required class="form-control">
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required class="form-control">
                </div>
                <select name="role" required class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br>

                <button type="submit" class="btn" name="envoyer">S'inscrire</button>
                <p>Vous avez un compte ? <a href="index.php?page=login">Se connecter</a></p>
            </form>
        </div>
    </div>

    

</div>
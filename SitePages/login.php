
<?php
    // On verifie la method et recupère la session
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            header("Location: index.php?page=home");
            exit;
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }


?>



<div class="container">
    <div class="row">
        <?php if(isset($error_message)): ?>
            <div id="message" class="alert alert-danger text-center mt-3">
                <?= htmlspecialchars($error_message) ?>
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
            <h1>Login</h1>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required class="form-control">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required class="form-control">
            </div>
            <button type="submit" class="btn" name="envoyer">Se connecter</button>
            <p>Vous n'avez pas de compte ? <a href="index.php?page=register">Créer un compte</a></p>
        </form>
    </div>

</div>


<script>
    setTimeout(() => {
        let msg = document.getElementById("message");
        if (msg) {
            msg.style.opacity = "0";
            setTimeout(() => msg.style.display = "none", 500);
        }
    }, 3000); 
</script>
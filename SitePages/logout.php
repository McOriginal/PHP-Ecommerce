<?php
session_start();
session_destroy();
header("Location: index.php?page=home"); // Rediriger vers la page d'accueil
exit();
?>
<?php
session_start();

// Vérifie si une session est active
if (isset($_SESSION['login'])) {
    session_unset(); // Optionnel, mais recommandé pour nettoyer les variables de session
    session_destroy(); // Détruit la session
}

// Redirige vers la page d'accueil ou une autre page après la déconnexion
header("Location: /");
exit(); // Assure que le script s'arrête après la redirection
?>
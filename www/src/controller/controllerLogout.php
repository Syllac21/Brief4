<?php
session_start();

// Inclut le fichier Log.php
require_once '../model/Log.php';
$logObj = new Log();

// Vérifie si une session est active
if (isset($_SESSION['login'])) {
    // Récupère l'ID du personnel pour le log
    $id_personnel = $_SESSION['id_personnel'];

    // Ajout d'une entrée dans la table Logs pour la déconnexion, en utilisant "Déconnexion" pour l'action
    $logObj->addLog('Déconnexion', 'Déconnexion', $id_personnel);

    session_unset(); // Optionnel, mais recommandé pour nettoyer les variables de session
    session_destroy(); // Détruit la session
}

// Redirige vers la page d'accueil ou une autre page après la déconnexion
header("Location: /");
exit(); // Assure que le script s'arrête après la redirection

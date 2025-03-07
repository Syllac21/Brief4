<?php


// Démarre la session PHP pour gérer les informations de session (par exemple, les utilisateurs connectés)
session_start();

// Inclusion des fichiers nécessaires pour interagir avec la base de données
require_once 'src/model/Model.php'; // Modèle de base pour les opérations en base de données
require_once 'src/model/Animaux.php'; // Modèle pour gérer les animaux

// Création d'une instance de la classe Animaux pour interagir avec les animaux
$animauxModel = new Animaux();

// Récupération de tous les animaux depuis la base de données à l'aide de la méthode getAllAnimaux
$animaux = $animauxModel->getAllAnimaux();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Déclaration du charset utilisé pour la page (UTF-8) -->
    <meta charset="UTF-8">
    <!-- Définition de la mise en page responsive pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Inclusion du fichier CSS de Bootstrap pour le style de la page -->
    <link rel="stylesheet" href="./style/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Inclusion de la barre de navigation -->
    <?php include './src/template/navbar.php'; ?>

    <?php 
    // Vérifie si l'utilisateur est connecté (session active) et si un paramètre 'page' est passé dans l'URL
    if (isset($_SESSION['login']) && isset($_GET['page']) ) {
        
        // Si la page demandée est 'dashboard', on inclut le template correspondant
        if ($_GET['page'] == 'dashboard') {
            require_once './src/template/dashboard.php';
        } else {
            // Si une autre page est demandée, on inclut le template principal
            include './src/template/main.php';
        }
    } else {
        // Si l'utilisateur n'est pas connecté, on affiche uniquement le template principal
        include './src/template/main.php';
    }

    // Inclusion du pied de page de la page
    include './src/template/footer.php';
    ?>

    <!-- Inclusion de scripts JavaScript nécessaires pour Bootstrap et autres éléments interactifs -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
</body>
</html>

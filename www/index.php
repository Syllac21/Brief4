<?php
session_start();
require_once 'src/model/Model.php';
require_once 'src/model/Animaux.php'; // Inclusion du fichier Animaux.php

// Création d'une instance de la classe Animaux
$animauxModel = new Animaux();

// Récupération des animaux depuis la base de données
$animaux = $animauxModel->getAllAnimaux();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <?php include './src/template/navbar.php';
    if (isset($_SESSION['login']) && isset($_GET['page']) ) {
        if ($_GET['page'] == 'dashboard') {
            include './src/template/dashboard.php';
        } else {
            include './src/template/main.php';
        }
    } else {
        include './src/template/main.php';
    }

    include './src/template/footer.php' ;?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
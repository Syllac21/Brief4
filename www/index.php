<?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

</body>
</html>
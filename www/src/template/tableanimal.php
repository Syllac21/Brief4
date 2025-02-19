<?php
// Inclure les fichiers nécessaires
require_once 'src/model/Model.php'; // Inclure le modèle de base
require_once 'src/model/Animaux.php'; // Inclure la classe Animaux

// Créer une instance de la classe Animaux
$animal = new Animaux;
// Récupérer tous les animaux
$allAnimals = $animal->getAllAnimaux();
?>
<!-- Début du document HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Animaux</title>
    <!-- Lien vers le CSS de Bootstrap pour le style du tableau -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Liste des Animaux</h2>
        <!-- Créer un tableau avec les classes Bootstrap -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Boucler à travers tous les animaux et les afficher dans le tableau
                foreach ($allAnimals as $animal) {
                    echo "<tr>";
                        echo "<td>" . $animal['nom'] . "</td>";
                        echo "<td>" . $animal['genre'] . "</td>";
                        echo "<td>" . $animal['description'] . "</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Lien vers le JS de Bootstrap pour des fonctionnalités supplémentaires -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

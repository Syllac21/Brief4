<?php
require_once(dirname(__DIR__, 1) . '/model/Animaux.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire
    $search = isset($_POST['search']) ? htmlspecialchars(trim($_POST['search'])) : '';

    // Inclure la classe Animaux
    // require_once('Animaux.php');

    // Instanciation du modèle
    $animauxModel = new Animaux();

    // Recherche des animaux
    $resultats = $animauxModel->searchAnimaux($search);

    // Vérifie si des résultats sont trouvés
    if (!empty($resultats)) {
        foreach ($resultats as $animal) {
            echo "<div class='animal-card'>";
            echo "<h3>" . htmlspecialchars($animal['nom']) . "</h3>";
            // echo "<p>Espèce : " . htmlspecialchars($animal['espece']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "Aucun animal trouvé.";
    }
}
?>

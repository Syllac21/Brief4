<?php
// Inclusion du fichier Cage.php situé dans le dossier parent du répertoire actuel
require_once (dirname(__DIR__,1).'/model/Cage.php');

// Création d'une instance de la classe Cage
$cageObj = new Cage;

// Récupération du nombre total de cages
$cageTot = $cageObj->countCages();

// Récupération du nombre de cages occupées
$cageOcc = $cageObj->countCagesOccupied();

// Calcul du nombre de cages disponibles en soustrayant les cages occupées du total
$cageDispo = $cageTot[0] - $cageOcc[0];

// Tableau associatif contenant les données à afficher
$donnees = [
    'Occupe' => $cageOcc[0],  // Nombre de cages occupées
    'Disponible' => $cageDispo // Nombre de cages disponibles
];

// Conversion du tableau en format JSON pour être utilisé en JavaScript
$donnees_json = json_encode($donnees);
?>

<!-- Carte affichant les informations sur l'occupation des cages -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Taux d'occupation</h3>
        <?php
        // Affichage du nombre total de cages
        echo "<p>Nombre de cages : " . $cageTot[0] . "</p>";
        // Affichage du nombre de cages occupées        
        echo "<p>Nombre de cages occupées : " . $cageOcc[0] . "</p>";
        ?>
    </div>
    <div class="card-body">
        <!-- Zone pour afficher un graphique -->
        <canvas id="occupationChart"></canvas>
    </div>
</div>

<!-- Script JavaScript pour afficher un graphique en camembert -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupération du contexte du canvas pour dessiner le graphique
    let ctx = document.getElementById('occupationChart').getContext('2d');
    
    // Récupération des données PHP converties en JSON
    let donnees = <?php echo $donnees_json; ?>;
    
    // Création d'un graphique de type "pie" avec Chart.js
    let myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(donnees), // Extraction des clés du tableau (Occupe, Disponible)
            datasets: [{
                data: Object.values(donnees), // Extraction des valeurs correspondantes
                backgroundColor: [
                    '#f56954', // Couleur rouge pour les cages occupées
                    '#00a65a'  // Couleur verte pour les cages disponibles
                ]
            }]
        },
        options: {
            responsive: true, // Rend le graphique adaptatif
            maintainAspectRatio: false, // Ne conserve pas le ratio hauteur/largeur fixe
            legend: {
                position: 'right' // Position de la légende à droite du graphique
            },
            tooltips: {
                callbacks: {
                    // Ajout de pourcentage à l'affichage des valeurs du graphique
                    label: function(tooltipItem, data) {
                        let dataset = data.datasets[tooltipItem.datasetIndex]; // Récupération du dataset
                        let total = dataset.data.reduce(function(previousValue, currentValue) {
                            return previousValue + currentValue;
                        }); // Calcul du total des valeurs
                        let currentValue = dataset.data[tooltipItem.index]; // Valeur actuelle
                        let percentage = Math.floor(((currentValue / total) * 100) + 0.5); // Calcul du pourcentage
                        return data.labels[tooltipItem.index] + ': ' + percentage + '%'; // Affichage du label + pourcentage
                    }
                }
            }
        }
    });
});
</script>

<?php
// récuparation du nombre de cages

// Exemple de données - à remplacer par vos données réelles depuis la base de données
$donnees = [
    'Occupé' => 62,
    'Disponible' => 30
];

// Conversion en format JSON pour JavaScript
$donnees_json = json_encode($donnees);
?>

<!-- HTML avec Bootstrap et AdminLTE -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Taux d'occupation</h3>
    </div>
    <div class="card-body">
        <canvas id="occupationChart"></canvas>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupération du contexte du canvas
    let ctx = document.getElementById('occupationChart').getContext('2d');
    
    // Récupération des données PHP
    let donnees = <?php echo $donnees_json; ?>;
    
    
    // Création du diagramme
    let myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(donnees),
            datasets: [{
                data: Object.values(donnees),
                backgroundColor: [
                    '#f56954', // Rouge pour "Occupé"
                    '#00a65a'  // Vert pour "Disponible"
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'right'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        let dataset = data.datasets[tooltipItem.datasetIndex];
                        let total = dataset.data.reduce(function(previousValue, currentValue) {
                            return previousValue + currentValue;
                        });
                        let currentValue = dataset.data[tooltipItem.index];
                        let percentage = Math.floor(((currentValue/total) * 100)+0.5);
                        return data.labels[tooltipItem.index] + ': ' + percentage + '%';
                    }
                }
            }
        }
    });
});
</script>
<?php
require_once (dirname(__DIR__,1).'/model/Cage.php');
// Récupérer toutes les cages
$cage = new Cage;
$allCages = $cage->getAllCages();
?>
    <div class="container mt-4">
        <h2 class="mb-4">Liste des Cages</h2>

        <!-- Create a table with Bootstrap classes -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>numero</th>
                    <th>alle</th>
                    <th>salle</th>
                </tr>
            </thead>
            
                <?php
                foreach ($allCages as $cage){
                    
                    echo "<tr>";
                    echo "<td>" . $cage['numero'] . "</td>";
                    echo "<td>" . $cage['allee'] . "</td>";
                    echo "<td>" . $cage['salle'] . "</td>";
                    echo "</tr>";
                }
                ?>
            
        </table>
        <button class="btn btn-success" data-toggle="modal" data-target="#addCageModal">Ajouter un enclos</button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

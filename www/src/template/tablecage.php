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
                    <th>supprimer</th>
                </tr>
            </thead>
            
                <?php
                foreach ($allCages as $cage){
                    
                    echo "<tr>";
                    echo "<td>" . $cage['numero'] . "</td>";
                    echo "<td>" . $cage['allee'] . "</td>";
                    echo "<td>" . $cage['salle'] . "</td>";
                    echo "<td class='text-center'><a href='./src/controller/controllerSupCage.php?delete_id=" . $cage['id_cage'] . "&confirm_delete=yes' class='btn btn-danger btn-sm' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer l'enclos numero : " . htmlspecialchars($cage['numero']) . " ?);'> Supprimer </a>";
                    echo "</tr>";
                }
                ?>
            
        </table>
        <button class="btn btn-success" data-toggle="modal" data-target="#addCageModal">Ajouter un enclos</button>

    </div>
<!-- modal Bootstrap ajouter un enclos -->
<div class="modal fade" id="addCageModal" tabindex="-1" aria-labelledby="addCageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addEmployeeModalLabel">Ajouter un enclos</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form method="POST" action="./src/controller/controllerAddCage.php">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero de la cage :</label>
                        <input type="text" name="numero" id="numero" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="allee" class="form-label">Allée :</label>
                        <input type="text" name="allee" id="allee" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="salle" class="form-label">Salle :</label>
                        <input type="text" name="salle" id="salle" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- vérification des données du formulaire en js -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var fields = ['numero', 'allee', 'salle'];

    fields.forEach(function (fieldId) {
        var field = document.getElementById(fieldId);

        // Ajouter un écouteur d'événements pour chaque champ
        field.addEventListener('input', function (event) {
            // Utiliser une expression régulière pour permettre uniquement les chiffres
            var sanitizedValue = event.target.value.replace(/[^0-9]/g, '');
            event.target.value = sanitizedValue;
        });
    });
});
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

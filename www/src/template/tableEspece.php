<?php
require_once(dirname(__DIR__,1).'/model/Espece.php');

$espece = new Espece;
$listEspeces = $espece->getAllEspeces();

?>

<div class="container mt-4">
    <h2 class="mb-4">Liste des espèces</h2>

    <!-- Create a table with Bootstrap classes -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>numero</th>
                <th>espèce</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($listEspeces as $espece){
                echo "<tr>";
                echo "<td>" . $espece['id_espece'] . "</td>";
                echo "<td>" . $espece['nom'] . "</td>";
                echo "<td class='text-center'><a href='#' class='btn btn-warning' data-toggle='modal' data-target='#modSpecieModal' date-id=1>modifier</a></td>";
                echo "<td class='text-center'><a href='' class='btn btn-danger'>supprimer</a></td>";
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <button class="btn btn-success" data-toggle="modal" data-target="#addSpecieModal">Ajouter Espèce</button>

</div>

<!-- Bootstrap Modal ajouter une espèce-->
<div class="modal fade" id="addSpecieModal" tabindex="-1" aria-labelledby="addSpecieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addSpecieModalLabel">Ajouter un Employé</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form method="POST" action="./src/controller/controllerAddSpecie.php">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal ajouter une espèce-->
<div class="modal fade" id="modSpecieModal" tabindex="-1" aria-labelledby="modSpecieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modSpecieModalLabel">Ajouter un Employé</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form method="POST" action="./src/controller/controllerUpdateSpecie.php">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
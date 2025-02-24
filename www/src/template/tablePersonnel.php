<?php
require_once (dirname(__DIR__,1).'/model/Personnel.php');
// Récupérer tous les personnels
$personnel = new Personnel;
$listPersonnel = $personnel->getAllPersonnel();
?>

<div class="container mt-4">
    <h2 class="mb-4">Liste des Personnel</h2>

    <!-- Create a table with Bootstrap classes -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>poste</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listPersonnel as $personne) {
                // Create a link to the employee profile page
                echo "<tr>";
                echo "<td><a href='?page=dashboard&table=employe&id=" . $personne['id_personnel'] . "'>" . htmlspecialchars($personne['nom']) . "</a></td>";
                echo "<td>" . htmlspecialchars($personne['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($personne['poste']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Ajouter Employé</button>

</div>

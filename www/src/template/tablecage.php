<?php
// Include necessary files
require_once 'src/model/Model.php';
require_once 'src/model/Cage.php';

// Create an instance of the Cage class
$cage = new Cage;
$allCages = $cage->getAllCages();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cages</title>

    <!-- Link to Bootstrap CSS for styling the table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2 class="mb-4">Liste des Cages</h2>

        <!-- Create a table with Bootstrap classes -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>numero</th>
                    <th>alle</th>
                    <th>salle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allCages as $cage){
                    echo "<tr>";
                    echo "<td" . $cage['id'] . "</td>";
                    echo "<td" . $cage['numero'] . "</td>";
                    echo "<td" . $cage['alle'] . "</td>";
                    echo "<td" . $cage['salle'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>
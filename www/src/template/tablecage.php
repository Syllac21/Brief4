<?php
require_once (dirname(__DIR__,1).'/model/Cage.php');
// Récupérer toutes les cages
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
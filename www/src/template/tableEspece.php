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
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($listEspeces as $espece){
                    echo "<tr>";
                    echo "<td>" . $espece['id_espece'] . "</td>";
                    echo "<td>" . $espece['nom'] . "</td>";
                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


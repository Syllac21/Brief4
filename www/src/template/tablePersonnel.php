<?php

require_once (dirname(__DIR__,1).'/model/Personnel.php');
// Récupérer tous les personnels
$personnel = new Personnel;
$listPersonnel = $personnel->getAllPersonnel();


// Include the model for personnel (employees)
require_once(dirname(__DIR__) . '/model/Personnel.php');

$modelPersonnel = new Personnel();

$success = false; // Flag to indicate success
$errorMessage = '';
$showModal = false; // Flag to control modal display















// Check if the form is submitted using POST method
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Process form submission
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $poste = $_POST['poste'];
//     $password = $_POST['password'];
//     $password2 = $_POST['password2'];
//     $login = $_POST['login'];



//     if ($password !== $password2) {
//         $errorMessage = "Les mots de passe ne correspondent pas!";
//         $showModal = true; // Show modal if error exists

//     } else {
//         $success = true;
//     }

    
// }
?>

<div class="container mt-4">
    <h2 class="mb-4">Liste des Personnel</h2>

    <!-- Create a table with Bootstrap classes -->
    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Poste</th>
        <th class="text-center">Modifier</th>  <!-- Nouvelle colonne pour Modifier -->
        <th class="text-center">Supprimer</th> <!-- Nouvelle colonne pour Supprimer -->
    </tr>
</thead>
<tbody>
    <?php
    foreach ($listPersonnel as $personne) {
        echo "<tr>";
        echo "<td><a href='?page=dashboard&table=employe&id=" . $personne['id_personnel'] . "'>" . htmlspecialchars($personne['nom']) . "</a></td>";
        echo "<td>" . htmlspecialchars($personne['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($personne['poste']) . "</td>";

            // Colonne Modifier : centrer le bouton Modifier
            echo "<td class='text-center'><a href='?page=updatePersonnel&id=" . $personne['id_personnel'] . "' class='btn btn-warning btn-sm'>Modifier</a></td>";

            // Colonne Supprimer : centrer le bouton Supprimer
            echo "<td class='text-center'>
                <a href='./src/controller/controllerSupPersonnel.php?delete_id=" . $personne['id_personnel'] . "&confirm_delete=yes' 
                class='btn btn-danger btn-sm' 
                onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer " . htmlspecialchars($personne['nom']) . " ?\");'>
                Supprimer
            </a>
    

            </td>";
    }






    ?>
        </tbody>
    </table>
</div>
<div class="container mt-5">

        <!-- Button to Open Modal -->
        <div class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                Ajouter un Employé
            </button>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Ajouter un Employé</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form method="POST" action="./src/controller/controllerPersonnel.php">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste :</label>
                            <select name="poste" id="poste" class="form-select" >
                                <option value="">-- Sélectionnez un poste --</option>
                                <option value="Soigneur">Soigneur</option>
                                <option value="Administratif">Administratif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="login" class="form-label">Login :</label>
                            <input type="text" name="login" id="login" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="password2" class="form-label">Confirmer Mot de passe :</label>
                            <input type="password" name="password2" id="password2" class="form-control" >
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php if ($showModal): ?>
    <div class="modal fade show" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true" style="display: block; background: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Erreur</h5>
                </div>
                <div class="modal-body">
                    <?php echo $errorMessage; ?>
                </div>
                <div class="modal-footer">
                <a href="tablePersonnel.php" class="btn btn-secondary">Fermer</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
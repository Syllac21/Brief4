<?php
// Include the model for personnel (employees)
require_once(dirname(__DIR__) . '/model/Personnel.php');

$modelPersonnel = new Personnel();

$success = false; // Flag to indicate success
$errorMessage = '';
$showModal = false; // Flag to control modal display

// Check if the form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $login = $_POST['login'];
   

    if ($password !== $password2) {
        $errorMessage = "Les mots de passe ne correspondent pas!";
        $showModal = true; // Show modal if error exists
    } else {
        $success = true;
    }
}


echo $login
// ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Personnel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Ajout Personnel</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h4 class="text-center mb-3">Ajouter un Employé</h4>

                    <!-- Form starts here -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste :</label>
                            <select name="poste" id="poste" class="form-select" required>
                                <option value="">-- Sélectionnez un poste --</option>
                                <option value="Soigneur">Soigneur</option>
                                <option value="Administratif">Administratif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="login" class="form-label">Login :</label>
                            <input type="text" name="login" id="login" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password2" class="form-label">Confirmer Mot de passe :</label>
                            <input type="password" name="password2" id="password2" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Ajouter</button>
                        </div>
                    </form>
                    <!-- Form ends here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for Error Message -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

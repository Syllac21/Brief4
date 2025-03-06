<?php
// Inclusion du modèle de gestion du personnel (employees)
require_once(dirname(__DIR__) . '/model/Personnel.php');
require_once(dirname(__DIR__) . '/model/Animaux.php');

// Récupération de l'ID de l'employé à afficher, par défaut 1 si non défini
$id = isset($_GET['id']) ? $_GET['id'] : 1;

// Création d'une instance de la classe Personnel
$modelPersonnel = new Personnel();

// Récupération des informations de l'employé correspondant à l'ID donné
$employe = $modelPersonnel->getPersonnelById($id); 

$animalObj = new Animaux();
$animaux = $animalObj->getAnimauxByPersonnel($id);
$allAnimaux = $animalObj->getAllAnimaux();
?>

<style>
    /* Style général du body */
    body {
        background-color: #AFDFDF; /* Couleur de fond */
        font-family: Arial, sans-serif; /* Police d'écriture */
    }

    /* Carte d'affichage des informations de l'employé */
    .employee-card {
        background: white;
        padding: 25px;
        border-radius: 10px; /* Coins arrondis */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Effet de transition */
    }

    /* Effet au survol de la carte employé */
    .employee-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    /* Style du bouton de réinitialisation */
    .btn-reset {
        background-color:#023636; /* Couleur du bouton */
        color: white;
        transition: background-color 0.3s ease;
    }

    /* Changement de couleur au survol du bouton */
    .btn-reset:hover {
        background-color: #AFDFDF;
    }

    /* Texte principal en noir */
    .text-primary {
        color:black;
    }

    /* Conteneur principal */
    .container {
        background-color: #AFDFDF;
        padding: 14px;
    }

    /* Style général des boutons */
    .btn {
        background:#023636;
    }
</style>

<body>






<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Informations sur l'Employé</h2>
    
    <!-- Affichage des détails de l'employé s'il existe -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if ($employe): ?>
                <div class="employee-card">
                    <h4 class="text-center mb-3">Détails de l'Employé</h4>
                    <p><strong>Nom :</strong> <?= htmlspecialchars($employe['nom']) ?></p>
                    <p><strong>Prénom :</strong> <?= htmlspecialchars($employe['prenom']) ?></p>
                    <p><strong>Poste :</strong> <?= htmlspecialchars($employe['poste']) ?></p>
                    <p><strong>Login :</strong> <?= htmlspecialchars($employe['login']) ?></p>

                    <!-- Bouton pour réinitialiser le mot de passe (fonctionnalité à implémenter) -->
                    <div class="text-center mt-4">
                        <button class="btn btn-reset px-4">Réinitialiser le mot de passe</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if($_SESSION['role'] == 'superadmin') :?>
            <div class="container d-flex justify-content-center gap-3">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#animalsTreated">gérer les animaux soigné</button>
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#animalsResp">gérer les animaux en responsabilité</button>
            </div>
        <?php else : ?>
        <div class="col-md-6">
            <?php 
            foreach($animaux as $animal){
                echo '<div class="employee-card mb-4">';
                echo '<h4 class="text-center mb-3">Animaux attribués</h4>';
                echo '<p><strong>Nom :</strong> ' . htmlspecialchars($animal['nom']) . '</p>';
                echo '<p><strong>Genre :</strong> ' . htmlspecialchars($animal['genre']) . '</p>';
                echo '<p><strong>Description :</strong> ' . htmlspecialchars($animal['description']) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="modal fade" id="animalsTreated" tabindex="-1" aria-labelledby="animalsTreatedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="animalsTreatedLabel">Animaux soigné par l'employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        
                            <th>nom</th>
                            <th>ajouter</th>
                            <th>retirer</th>
                        
                    </thead>
                    <tbody>
                        <?php foreach($allAnimaux as $animalTread) : ?>
                            
                            <?php $soigne = false;
                                foreach($animaux as $animal) : ?>
                                    <tr>
                                    <?php if($animalTread['id_animal'] == $animal['id_animal']){$soigne = true;} ?>
                                <?php endforeach; ?>
                                    <td><?=$animalTread['nom']?></td><?php echo ($soigne == true)? "<td></td><td><a href='/src/controller/controllerSupTreadAnimal.php?idAnimal=". $animalTread['id_animal'] ."&idPersonnel=". $_GET['id'] ."' class='btn btn-danger'>supprimer</a>" : "<td><a href='/src/controller/controllerAddTreadAnimal.php?idAnimal=". $animalTread['id_animal'] ."&idPersonnel=". $_GET['id'] . "' class='btn btn-primary'>ajouter</a></td><td></td>"; ?>
                                    </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-secondary">Valider</button>
            </div>
            
        </div>
    </div>

</div>

<!-- modale pour attribuer ou oter la responsabilité d'un animal -->
<div class="modal fade" id="animalsResp" tabindex="-1" aria-labelledby="animalsRespLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="animalsRespLabel">Animaux dont l'employé est responsable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        
                            <th>nom</th>
                            <th>ajouter</th>
                        
                        
                    </thead>
                    <tbody>
                        <?php foreach($allAnimaux as $animalResp) : ?>
                            
                            <?php $resp = false;
                                if($animalResp['id_responsable'] == $_GET['id']){$resp = true;} ?>
                                    <tr>
                                    <td><?=$animalResp['nom']?></td><?php echo ($resp == true)? "<td></td><td> déjà responsable" : "<td><a href='/src/controller/controllerAddRespAnimal.php?idAnimal=". $animalResp['id_animal'] ."&idPersonnel=". $_GET['id'] . "' class='btn btn-primary'>ajouter</a></td><td></td>"; ?>
                                    </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-secondary">Valider</button>
            </div>
            
        </div>
    </div>

</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="setEmployeeModal" tabindex="-1" aria-labelledby="setEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="setEmployeeModalLabel">Ajouter un Employé</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form method="POST" action="./src/controller/controllerModPersonnel.php">
                        <div class="mb-3">
                            <input type="hidden" name="id" value=<?= $employe['id_personnel'] ?>>
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" value=<?= $employe['nom'] ?>>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" value=<?= $employe['prenom'] ?>>
                        </div>

                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste :</label>
                            <select name="poste" id="poste" class="form-select">
                                <option value="">-- Sélectionnez un poste --</option>
                                <option value="Soigneur" <?=($employe['poste']=='soigneur')?'selected':''?>>Soigneur</option>
                                <option value="Administratif" <?=($employe['poste']=='administratif')?'selected':''?>>Administratif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="login" class="form-label">Login :</label>
                            <input type="text" name="login" id="login" class="form-control" value=<?= $employe['login'] ?>>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Pied de page -->
<footer class="text-dark text-center custom-footer py-4 mt-5">
    <div class="container">
        <p class="mb-1">@2025 Refuge pour Animaux. WebNovices : Tous droits réservés.</p>
    </div>
</footer>

<?php 
if(isset($_GET['action'])){
    if($_GET['action'] == 'set'){
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "var setEmployeeModal = new bootstrap.Modal(document.getElementById('setEmployeeModal'));";
        echo "setEmployeeModal.show();";
        echo "});";
        echo "</script>";
    }
    
}
?>
<!-- Inclusion du fichier JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

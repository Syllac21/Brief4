<?php
// Inclusion du fichier Animaux.php situé dans le dossier parent du répertoire actuel
require_once(dirname(__DIR__,1).'/model/Animaux.php');
require_once(dirname(__DIR__,1).'/model/Cage.php');

// Vérification si un identifiant (id) est passé en paramètre GET
if(isset($_GET['id'])){
    $id = $_GET['id']; // Récupération de l'identifiant de l'animal
}else{
    // Redirection vers la page de déconnexion si aucun identifiant n'est fourni
    header('Location: /controller/logout.php');
}

// Création d'une instance de la classe Animaux
$modelAnimaux = new Animaux;
$objCage = new Cage;

// Récupération des informations de l'animal correspondant à l'ID
$animal = $modelAnimaux->getAnimalById($id);
$allCages = $objCage->getAllCages();

// Récupération des espèces associées à l'animal
$especes = $modelAnimaux->getSpeciesById($id);
?>

<body>
<style>
    /* Style général de la page */
    body {
        background-color: #a9c8d4; /* Couleur de fond de la page */
    }
    .card, .highlight {
        background-color: #dcecec; /* Couleur de fond des cartes */
        border-radius: 10px; /* Coins arrondis */
        padding: 15px; /* Espacement intérieur */
        box-shadow: 2px 2px 10px rgba(0,0,0,0.1); /* Ombre portée */
        height: 100%;
    }
    .highlight {
        background-color: #ffffff; /* Fond blanc pour la section adoption */
        border: 2px solid #0066cc; /* Bordure bleue */
    }
    .container {
        background-color: #AFDFDF; /* Fond du conteneur principal */
        padding: 14px;
    }
    .img-container img {
        width: 100%; /* Image prend toute la largeur du conteneur */
        height: 100%; /* Image prend toute la hauteur */
        object-fit: cover; /* Ajuste l'image pour couvrir sans déformation */
        border-radius: 10px; /* Coins arrondis */
    }
</style>

<div class="container mt-4">
    
    <div class="row">
        <!-- Colonne de gauche : Informations sur le soigneur -->
        <div class="col-md-6">
            <div class="card">
                <h5>Informations sur les Soigneurs :</h5>
                <div>
                    <?php 
                    // Affichage des informations des soigneurs associés à l'animal
                    foreach($animal as $soigneur){
                        echo "<p><strong>Nom :</strong> " . $soigneur['prenom'] . " " . $soigneur['nomSoigneur'] . "</p>";
                    } 
                    ?>
                </div>
            </div>
        </div>

        <!-- Colonne de droite : Affichage de la photo de l'animal -->
        <div class="col-md-6">
            <div class="img-container">
                <img src= <?=$animal[0]['image']?> alt="Image de l'animal">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Colonne de gauche : Informations sur l'animal -->
        <div class="col-md-6">
            <div class="card">
                <h5>Informations sur l'Animal :</h5>
                <p><strong>Nom :</strong> Max</p>
                <p><strong>Espèce :</strong>
                <?php 
                // Affichage des espèces associées à l'animal
                foreach($especes as $espece){
                    echo $espece['nom'] . " ";
                }
                ?> 
                </p>
                <p><strong>Genre :</strong> 
                <?= $sexe = $animal[0]['genre'] === 'F' ? 'Femelle' : 'Mâle';?>  
                </p>
                <p><strong>Date de naissance :</strong> <?=$animal[0]['date_naissance']?></p>
                <p><strong>Identifiant :</strong> <?= $animal[0]['numero']?></p>
            </div>
        </div>

        <!-- Colonne de droite : Informations sur l’adoption -->
        <div class="col-md-6">
            <div class="highlight">
                <h5>Options d’Adoption :</h5>
                <p><strong>Statut :</strong> Disponible</p>
                <p><strong>Frais d’adoption :</strong> 150 €</p>
                <p><strong>Procédure :</strong> Une visite est recommandée avant l'adoption. Les frais couvrent la vaccination, la stérilisation et l’identification.</p>
                <button class="btn btn-primary">Remplir le formulaire d’adoption</button>
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

<!-- Structure de la modale -->
<div class="modal fade" id="modAnimalModal" tabindex="-1" role="dialog" aria-labelledby="modAnimalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modAnimalModalLabel">Ajouter un Animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../src/controller/controllerModanimal.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id_animal" value=<?=$animal[0]['id_animal']?>>
                                <input type="text" class="form-control" name="animalName" placeholder="Nom" value=<?=$animal[0]['nom']?> required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="animalNumber" placeholder="Numéro" pattern="^[\dA-Za-z]+$" value=<?=$animal[0]['numero']?> required>
                            </div>
                            
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <textarea class="form-control" name="animalDescription" rows="3" placeholder="Description" required><?=$animal[0]['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="animalImage" placeholder="Image URL" value=<?=$animal[0]['image']?> >
                            </div>
                            <div class="form-group">
                                <label for="animalcage">Cage</label>
                                <select class="form-control" name="animalcage" id="animalcage" required>
                                    <option value="">---</option>
                                    <?php foreach ($allCages as $cage) {
                                        $select ='';
                                        if($cage['id_cage'] == $animal[0]['id_cage']){
                                            $select ='selected';
                                        }
                                        echo "<option value=".$cage['id_cage']." ". $select . ">". $cage['numero'] ."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'set'){
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "var modAnimalModal = new bootstrap.Modal(document.getElementById('modAnimalModal'));";
        echo "modAnimalModal.show();";
        echo "});";
        echo "</script>";
    }
    
}
?>

<!-- Importation de Bootstrap pour les styles et composants interactifs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

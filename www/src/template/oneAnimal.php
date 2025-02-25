<?php
// Inclusion du fichier Animaux.php situé dans le dossier parent du répertoire actuel
require_once(dirname(__DIR__,1).'/model/Animaux.php');

// Vérification si un identifiant (id) est passé en paramètre GET
if(isset($_GET['id'])){
    $id = $_GET['id']; // Récupération de l'identifiant de l'animal
}else{
    // Redirection vers la page de déconnexion si aucun identifiant n'est fourni
    header('Location: /controller/logout.php');
}

// Création d'une instance de la classe Animaux
$modelAnimaux = new Animaux;

// Récupération des informations de l'animal correspondant à l'ID
$animal = $modelAnimaux->getAnimalById($id);

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

<!-- Importation de Bootstrap pour les styles et composants interactifs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

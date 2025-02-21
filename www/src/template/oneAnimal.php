<?php
require_once(dirname(__DIR__,1).'/model/Animaux.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location: /controller/logout.php');
}
$modelAnimaux = new Animaux;
$animal = $modelAnimaux->getAnimalById($id);
$especes = $modelAnimaux->getSpeciesById($id);

?>
<body>
<style>
    body {
        background-color: #a9c8d4;
    }
    .card, .highlight {
        background-color: #dcecec;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        height: 100%;
    }
    .highlight {
        background-color: #ffffff;
        border: 2px solid #0066cc;
    }
    .container {
        background-color: #AFDFDF;
        padding: 14px;
    }
    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }
</style>

<div class="container mt-4">
    
    <div class="row">
        <!-- Left Column: Soigneur Info -->
        <div class="col-md-6">
            <div class="card ">
                <h5>Informations sur les Soigneurs :</h5>
                <div>
                    <?php foreach($animal as $soigneur){
                        echo "<p><strong>Nom :</strong>". $soigneur['prenom']." ". $soigneur['nomSoigneur'] ."</p>";
                    } ?>
                </div>
            </div>
        </div>

        <!-- Right Column: Animal Photo -->
        <div class="col-md-6">
            <div class="img-container">
                <img src= <?=$animal[0]['image'] ?> alt="Image de l'animal">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Left Column: Animal Info -->
        <div class="col-md-6">
            <div class="card">
                <h5>Informations sur l'Animal :</h5>
                <p><strong>Nom :</strong> Max</p>
                <p><strong>Espèce :</strong><?php 
                foreach($especes as $espece){
                    echo $espece['nom'] . " ";
                }
                ?> </p>
                <p><strong>Genre :</strong> <?= $sexe = $animal[0]['genre'] === 'F' ? 'Femelle' : 'Mâle';?>  </p>
                <p><strong>Date de naissance :</strong><?=$animal[0]['date_naissance'] ?></p>
                <p><strong>Identifiant :</strong><?= $animal[0]['numero'] ?></p>
            </div>
        </div>

        <!-- Right Column: Options d’Adoption -->
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

<footer class="text-dark text-center custom-footer py-4 mt-5">
    <div class="container">
        <p class="mb-1">@2025 Refuge pour Animaux. WebNovices : Tous droits réservés.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

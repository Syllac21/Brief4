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
    </div>
</div>

<!-- Pied de page -->
<footer class="text-dark text-center custom-footer py-4 mt-5">
    <div class="container">
        <p class="mb-1">@2025 Refuge pour Animaux. WebNovices : Tous droits réservés.</p>
    </div>
</footer>

<!-- Inclusion du fichier JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

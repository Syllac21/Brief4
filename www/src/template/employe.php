<?php
// Include the model for personnel (employees)
require_once(dirname(__DIR__) . '/model/Personnel.php');
require_once(dirname(__DIR__) . '/model/Animaux.php');

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$modelPersonnel = new Personnel();
$employe = $modelPersonnel->getPersonnelById($id); 

$animalObj = new Animaux();
$animaux = $animalObj->getAnimauxByPersonnel($id);
?>

    <style>
        body {
            background-color: #AFDFDF;
            font-family: Arial, sans-serif;
        }

        .employee-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .employee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .btn-reset {
            background-color:#023636;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-reset:hover {
            background-color: #AFDFDF;
        }

        .text-primary {
            color:black;
        }

        .container {
            background-color: #AFDFDF;
            padding: 14px;
        }
        .btn{
            background:#023636;
        }
    </style>
<body>



<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Informations sur l'Employé</h2>
    
    <!-- Loop through personnel and display the details -->
    <div class="row justify-content-center">
        <div class="col-md-6">
        <?php if ($employe): ?>
                <div class="employee-card">
                    <h4 class="text-center mb-3">Détails de l'Employé</h4>
                    <p><strong>Nom :</strong> <?= htmlspecialchars($employe['nom']) ?></p>
                    <p><strong>Prénom :</strong> <?= htmlspecialchars($employe['prenom']) ?></p>
                    <p><strong>Poste :</strong> <?= htmlspecialchars($employe['poste']) ?></p>
                    <p><strong>Login :</strong> <?= htmlspecialchars($employe['login']) ?></p>

                    <!-- Button to reset the password (this could be a placeholder for actual functionality) -->
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

<footer class="text-dark text-center custom-footer py-4 mt-5">
    <div class="container">
        <p class="mb-1">@2025 Refuge pour Animaux. WebNovices : Tous droits réservés.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Inclure les fichiers nécessaires
require_once 'src/model/Model.php';
require_once 'src/model/Animaux.php';

// Créer une instance de la classe Animaux
$animalObj = new Animaux;

// Définir le nombre d'animaux par page
$limit = 10;

// Récupérer le numéro de page depuis l'URL (1 par défaut)
$page = isset($_GET['index']) ? (int)$_GET['index'] : 1;
$page = max($page, 1); // S'assurer que la page est au minimum 1

// Calculer l'offset
$offset = ($page - 1) * $limit;

// Récupérer les paramètres de tri depuis l'URL
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'nom'; // Colonne par défaut pour le tri
$order = isset($_GET['order']) ? $_GET['order'] : 'asc'; // Ordre par défaut
// Récupérer les animaux de la page courante
$paginatedAnimals = $animalObj->getPaginatedAnimaux($limit, $offset, $sort, $order);

// Récupérer le nombre total d'animaux pour la pagination
$totalAnimals = $animalObj->getTotalAnimaux();

// Calculer le nombre total de pages
$totalPages = ceil($totalAnimals / $limit);
?>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Animaux</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
            <th>
                Nom <a href="/?page=dashboard&table=animaux&sort=nom&order=<?= ($sort == 'nom' && $order == 'asc') ? 'desc' : 'asc' ?>">
                         <?= ($sort == 'nom') ? ($order == 'asc' ? '↑' : '↓') : '' ?>
                    </a>
            </th>
            <th>
                Espèce(s)
            </th>
                <th>
                    <a href="/?page=dashboard&table=animaux&sort=genre&order=<?= ($sort == 'genre' && $order == 'asc') ? 'desc' : 'asc' ?>">
                    genre <?= ($sort == 'genre') ? ($order == 'asc' ? '↑' : '↓') : '' ?>
                    </a>
                </th>
                <th>
                    description
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($paginatedAnimals as $animal): ?>
            <tr>
                <!-- Récupérer la ou les espèce (s) de l'animal -->
                <?php $espece = $animalObj->getSpeciesById($animal['id_animal']); ?>
                <td>
                    <a href='/?page=dashboard&table=animaux&id=<?php echo $animal['id_animal'];?>'>
                    <?= htmlspecialchars($animal['nom']) ?>
                    </a>
                </td>
                <td>
                    <!-- afficher la ou les espèces -->
                    <?php foreach($espece as $especes): ?>
                        <?= htmlspecialchars($especes['nom']) ?>
                    <?php endforeach; ?>
                </td>
                <td><?= htmlspecialchars($animal['genre']) ?></td>
                <td><?= htmlspecialchars($animal['description']) ?></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination Bootstrap -->
    <nav>
        <ul class="pagination justify-content-center">
            <!-- Bouton Précédent -->
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= max($page - 1, 1) ?>">Précédent</a>
            </li>

            <!-- Numéros de pages -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Bouton Suivant -->
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= min($page + 1, $totalPages) ?>">Suivant</a>
            </li>
        </ul>
        </tbody>
    </table>

 <!-- Pagination -->
    <style>
        label {
            color: black;
        }
    </style>
</head>
<body>
    <!-- Bouton pour déclencher la modale -->
    <button class="btn btn-success" data-toggle="modal" data-target="#addAnimalModal">Ajouter Animal</button>
    
    <!-- Structure de la modale -->
    <div class="modal fade" id="addAnimalModal" tabindex="-1" role="dialog" aria-labelledby="addAnimalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addAnimalModalLabel">Ajouter un Animal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalName" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="animalGender">Genre</label>
                            <select class="form-control" id="animalGender">
                                <option value="male">...</option>
                                <option value="male">Mâle</option>
                                <option value="female">Femelle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalNumber" placeholder="Numéro">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalEspèce" placeholder="Espèce">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalpays" placeholder="Pays">
                        </div>
                        <div class="form-group">
                            <label for="animalArrivalDate">Date d'Arrivée</label>
                            <input type="date" class="form-control" id="animalArrivalDate">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="animalDescription" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalImage" placeholder="URL de l'image">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="animalCage" placeholder="Cage">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".btn-primary").addEventListener("click", function () {
        let isValid = true;
        let errorMessage = "";

        let name = document.getElementById("animalName").value.trim();
        let gender = document.getElementById("animalGender").value;
        let number = document.getElementById("animalNumber").value.trim();
        let species = document.getElementById("animalSpecies").value.trim();
        let country = document.getElementById("animalCountry").value.trim();
        let arrivalDate = document.getElementById("animalArrivalDate").value;
        let description = document.getElementById("animalDescription").value.trim();
        let imageUrl = document.getElementById("animalImage").value.trim();
        let cage = document.getElementById("animalCage").value.trim();

        // Effectuez vos validations et traitements ici
        if (name === '') {
            isValid = false;
            errorMessage += "Le nom ne peut pas être vide.\n";
        }
        if (gender === '...') {
            isValid = false;
            errorMessage += "Veuillez sélectionner un genre.\n";
        }
        if (!preg_match('/^\d+$/', number)) {
            isValid = false;
            errorMessage += "Le numéro doit contenir uniquement des chiffres.\n";
        }
        if (country === '') {
            isValid = false;
            errorMessage += "Le pays ne peut pas être vide.\n";
        }
        if (arrivalDate === '') {
            isValid = false;
            errorMessage += "Veuillez entrer une date d'arrivée.\n";
        }
        if (description === '') {
            isValid = false;
            errorMessage += "La description ne peut pas être vide.\n";
        }
        if (!preg_match('/^(https?:\/\/.*\.(?:png|jpg|jpeg|gif|bmp))$/i', imageUrl)) {
            isValid = false;
            errorMessage += "Veuillez entrer une URL d'image valide (terminant par .png, .jpg, etc.).\n";
        }
        if (cage === '') {
            isValid = false;
            errorMessage += "Le champ 'Cage' ne peut pas être vide.\n";
        }

        if (!isValid) {
            alert(errorMessage);
        } else {
            // Traitement pour ajouter l'animal (enregistrer dans la base de données, etc.)
            alert("Formulaire valide ! Ajout de l'animal...");
        }
    });
});
</script>
</html>







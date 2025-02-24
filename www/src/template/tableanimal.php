<?php
// Inclure les fichiers nécessaires
require_once 'src/model/Model.php';
require_once 'src/model/Animaux.php';

// Créer une instance de la classe Animaux
$animal = new Animaux;

// Définir le nombre d'animaux par page
$limit = 10;

// Récupérer le numéro de page depuis l'URL (1 par défaut)
$page = isset($_GET['index']) ? (int)$_GET['index'] : 1;
$page = max($page, 1); // S'assurer que la page est au minimum 1

// Calculer l'offset
$offset = ($page - 1) * $limit;

// Récupérer les animaux de la page courante
$paginatedAnimals = $animal->getPaginatedAnimaux($limit, $offset);

// Récupérer le nombre total d'animaux pour la pagination
$totalAnimals = $animal->getTotalAnimaux();

// Calculer le nombre total de pages
$totalPages = ceil($totalAnimals / $limit);
?>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Animaux</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Genre</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($paginatedAnimals as $animal): ?>
            <tr>
                <td>
                    <a href='/?page=dashboard&table=animaux&id=<?php echo $animal['id_animal'];?>'>
                    <?= htmlspecialchars($animal['nom']) ?>
                    </a>
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
<?php


<?php
// Inclure les fichiers nécessaires pour le modèle de données
require_once 'src/model/Model.php'; // Modèle de base pour les opérations en base de données
require_once 'src/model/Animaux.php'; // Modèle pour gérer les animaux

// Créer une instance de la classe Animaux pour interagir avec les animaux
$animal = new Animaux;

// Définir le nombre d'animaux à afficher par page
$limit = 10;

// Récupérer le numéro de la page actuelle depuis l'URL (valeur par défaut 1)
$page = isset($_GET['index']) ? (int)$_GET['index'] : 1;
// S'assurer que la page soit au minimum 1 (pas de page négative ou nulle)
$page = max($page, 1);

// Récupérer les paramètres de tri depuis l'URL (valeur par défaut 'nom')
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'nom'; // La colonne par défaut pour trier
$order = isset($_GET['order']) ? $_GET['order'] : 'asc'; // L'ordre de tri (ascendant par défaut)

// Calculer l'offset pour la requête de pagination
$offset = ($page - 1) * $limit;

// Récupérer les animaux pour la page courante, avec tri par colonne et ordre spécifiés
$paginatedAnimals = $animal->getPaginatedAnimaux($limit, $offset, $sort, $order);

// Récupérer le nombre total d'animaux pour pouvoir calculer la pagination
$totalAnimals = $animal->getTotalAnimaux();

// Calculer le nombre total de pages en fonction du nombre d'animaux et du nombre d'animaux par page
$totalPages = ceil($totalAnimals / $limit);
?>

<div class="container mt-4">
    <h2 class="mb-4">Liste des Animaux</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <!-- Colonne pour le tri par Nom -->
                <th>
                    <a href="/?page=dashboard&table=animaux&sort=nom&order=<?= ($sort == 'nom' && $order == 'asc') ? 'desc' : 'asc' ?>">
                        Nom <?= ($sort == 'nom') ? ($order == 'asc' ? '↑' : '↓') : '' ?>
                    </a>
                </th>
                <!-- Colonne pour le tri par Genre -->
                <th>
                    <a href="/?page=dashboard&table=animaux&sort=genre&order=<?= ($sort == 'genre' && $order == 'asc') ? 'desc' : 'asc' ?>">
                        Genre <?= ($sort == 'genre') ? ($order == 'asc' ? '↑' : '↓') : '' ?>
                    </a>
                </th>
                <!-- Colonne pour le tri par Description -->
                <th>
                    <a href="/?page=dashboard&table=animaux&sort=description&order=<?= ($sort == 'description' && $order == 'asc') ? 'desc' : 'asc' ?>">
                        Description <?= ($sort == 'description') ? ($order == 'asc' ? '↑' : '↓') : '' ?>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php 
        // Boucle pour afficher les animaux récupérés
        foreach ($paginatedAnimals as $animal): ?>
            <tr>
                <!-- Affichage du nom de l'animal avec un lien vers sa page détaillée -->
                <td>
                    <a href='/?page=dashboard&table=animaux&id=<?php echo $animal['id_animal'];?>'>
                    <?= htmlspecialchars($animal['nom']) ?>
                    </a>
                </td>
                <!-- Affichage du genre de l'animal -->
                <td><?= htmlspecialchars($animal['genre']) ?></td>
                <!-- Affichage de la description de l'animal -->
                <td><?= htmlspecialchars($animal['description']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination avec les boutons Précédent, numéros de pages et Suivant -->
    <nav>
        <ul class="pagination justify-content-center">
            <!-- Bouton pour aller à la page précédente -->
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= max($page - 1, 1) ?>&sort=<?= $sort ?>&order=<?= $order ?>">Précédent</a>
            </li>

            <!-- Boucle pour afficher les numéros de pages -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= $i ?>&sort=<?= $sort ?>&order=<?= $order ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Bouton pour aller à la page suivante -->
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= min($page + 1, $totalPages) ?>&sort=<?= $sort ?>&order=<?= $order ?>">Suivant</a>
            </li>
        </ul>
    </nav>
</div>

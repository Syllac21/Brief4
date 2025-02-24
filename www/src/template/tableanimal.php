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
                <th>Nom <button>Î</button></th>
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
        <?php foreach ($paginatedAnimals as $animal): ?>
            <tr>
                <td><a href='/?page=dashboard&table=animaux&id=<?= $animal['id_animal'] ?>'><?= htmlspecialchars($animal['nom']) ?></a></td>
                <td><?= htmlspecialchars($animal['genre']) ?></td>
                <td><?= htmlspecialchars($animal['description']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

 <!-- Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= max($page - 1, 1) ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) ?>">Précédent</a>
        </li>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= $i ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= min($page + 1, $totalPages) ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) ?>">Suivant</a>
        </li>
    </ul>
</nav>
<?php
// Récupérer les paramètres de tri depuis l'URL sous forme de tableaux
$sort = isset($_GET['sort']) ? explode(',', $_GET['sort']) : ['nom'];
$order = isset($_GET['order']) ? explode(',', $_GET['order']) : ['asc'];

// Calculer l'offset
$offset = ($page - 1) * $limit;

// Récupérer les animaux triés
$paginatedAnimals = $animal->getPaginatedAnimaux($limit, $offset, $sort, $order);

// Récupérer le nombre total d'animaux pour la pagination
$totalAnimals = $animal->getTotalAnimaux();
$totalPages = ceil($totalAnimals / $limit);
?>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Animaux</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th><a href="<?= getSortUrl('nom', $sort, $order) ?>">Nom <?= ($sort[0] == 'nom') ? ($order[0] == 'asc' ? '↑' : '↓') : '' ?></a></th>
                <th><a href="<?= getSortUrl('genre', $sort, $order) ?>">Genre <?= ($sort[0] == 'genre') ? ($order[0] == 'asc' ? '↑' : '↓') : '' ?></a></th>
                <th><a href="<?= getSortUrl('description', $sort, $order) ?>">Description <?= ($sort[0] == 'description') ? ($order[0] == 'asc' ? '↑' : '↓') : '' ?></a></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($paginatedAnimals as $animal): ?>
            <tr>
                <td><a href='/?page=dashboard&table=animaux&id=<?= $animal['id_animal'] ?>'><?= htmlspecialchars($animal['nom']) ?></a></td>
                <td><?= htmlspecialchars($animal['genre']) ?></td>
                <td><?= htmlspecialchars($animal['description']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= max($page - 1, 1) ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) }">Précédent</a> </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= $i ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/?page=dashboard&table=animaux&index=<?= min($page + 1, $totalPages) ?>&sort=<?= implode(',', $sort) ?>&order=<?= implode(',', $order) }">Suivant</a>
            </li>
        </ul>
    </nav>
</div>

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
            <a href='/?page=dashboard&table=animaux&id=<?php echo $animal['id_animal']; ?>'>
              <?= htmlspecialchars($animal['nom']) ?>
            </a>
          </td>
          <td>
            <!-- afficher la ou les espèces -->
            <?php foreach ($espece as $especes): ?>
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
    <!DOCTYPE html>
    <html lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ajouter Animal</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
      <!-- Bouton pour déclencher la modale -->
      <button class="btn btn-success" data-toggle="modal" data-target="#addAnimalModal">Ajouter Animal</button>

      <!-- Structure de la modale -->
      <div class="modal fade" id="addAnimalModal" tabindex="-1" role="dialog" aria-labelledby="addAnimalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="addAnimalModalLabel">Ajouter un Animal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../src/controller/controlleranimal.php" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="animalName" placeholder="Nom">
                    </div>
                    <div class="form-group">
                   <label>Genre</label>
                     <div>
                          <label><input type="checkbox" name="animalGender[]" value="male"> Mâle</label><br>
                          <label><input type="checkbox" name="animalGender[]" value="male">Femelle</label><br>
                      </div>
                  </div>
                      <div class="form-group">
                      <input type="text" class="form-control" name="animalNumber" placeholder="Numéro" >
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="animalCountry" placeholder="Pays">
                    </div>
                    <div class="form-group">
                      <label for="animalBirthDate">Date de Naissance</label>
                      <input type="date" class="form-control" name="animalBirthDate">
                    </div>
                    <div class="form-group">
                      <label for="animalArrivalDate">Date d'Arrivée</label>
                      <input type="date" class="form-control" name="animalArrivalDate">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="animalSpecies">Espèce</label>
                          <div class="row">
                              <div class="col-md-6">
                                  <label><input type="checkbox" name="animalSpecies[]" value="lion"> Lion</label><br>
                                  <label><input type="checkbox" name="animalSpecies[]" value="tigre"> Tigre</label><br>
                                  <label><input type="checkbox" name="animalSpecies[]" value="éléphant"> Éléphant</label><br>
                              </div>
                              <div class="col-md-6">
                                  <label><input type="checkbox" name="animalSpecies[]" value="girafe"> Girafe</label><br>
                                  <label><input type="checkbox" name="animalSpecies[]" value="zèbre"> Zèbre</label><br>
                                  <label><input type="checkbox" name="animalSpecies[]" value="ours"> Ours</label><br>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="animalDescription" rows="3" placeholder="Description"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="animalImage" placeholder="Image URL">
                  </div>
                  <div class="form-group">
                    <label for="animalcage">Cage</label>
                    <select class="form-control" name="animalcage" id="animalcage">
                        <?php
                            for ($i = 0; $i <= 35; $i++) {
                               echo "<option value=\"$i\">$i</option>";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
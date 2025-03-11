<?php
// Inclusion des modèles nécessaires
require_once(dirname(__DIR__, 1) . '/model/Animaux.php'); // Modèle pour la gestion des animaux
require_once(dirname(__DIR__, 1) . '/model/Model.php'); // Modèle général

// Instanciation de la classe Animaux
$animauxModel = new Animaux;

// Vérification si un utilisateur (personnel) est connecté
if (isset($_SESSION['id_personnel'])) {
    // Récupération de l'ID du personnel connecté
    $id_personnel = $_SESSION['id_personnel'];

    // Récupération de la liste des animaux assignés à ce personnel
    $animaux = $animauxModel->getAnimauxByPersonnel($id_personnel);
}
?>

<style>
    /* Styles pour les cartes d'animaux */
    .card {
        max-width: 250px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    /* Effet au survol des cartes */
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Style des titres principaux */
    .heading-style {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        transition: color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-left: 60px;
        margin-right: 60px;
        padding: 8px;
    }

    /* Effet au survol des titres */
    .heading-style:hover {
        color: #ff6600;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
    }
</style>

<main class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4">Bienvenue au refuge pour animaux</h1>

    <!-- Section de filtrage et recherche -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Formulaire de sélection des espèces -->
        <!-- <form method="POST" action="">
            <select class="form-control" name="species" onchange="this.form.submit()">
                <option value="all">Toutes les espèces</option>
                <option value="chien" <?php echo (isset($_POST['species']) && $_POST['species'] == 'chien') ? 'selected' : ''; ?>>Chiens</option>
                <option value="giraffe" <?php echo (isset($_POST['species']) && $_POST['species'] == 'giraffe') ? 'selected' : ''; ?>>Giraffes</option>
                <option value="elephant" <?php echo (isset($_POST['species']) && $_POST['species'] == 'elephant') ? 'selected' : ''; ?>>Éléphants</option>
                <option value="crocodile" <?php echo (isset($_POST['species']) && $_POST['species'] == 'crocodile') ? 'selected' : ''; ?>>Crocodiles</option>
                <option value="serpent" <?php echo (isset($_POST['species']) && $_POST['species'] == 'serpent') ? 'selected' : ''; ?>>Serpents</option>
                <option value="loup" <?php echo (isset($_POST['species']) && $_POST['species'] == 'loup') ? 'selected' : ''; ?>>Loups</option>
                <option value="chat" <?php echo (isset($_POST['species']) && $_POST['species'] == 'chat') ? 'selected' : ''; ?>>Chats</option>
                <option value="ane" <?php echo (isset($_POST['species']) && $_POST['species'] == 'ane') ? 'selected' : ''; ?>>Ânes</option>
                <option value="mulet" <?php echo (isset($_POST['species']) && $_POST['species'] == 'mulet') ? 'selected' : ''; ?>>Mulets</option>
                <option value="cheval" <?php echo (isset($_POST['species']) && $_POST['species'] == 'cheval') ? 'selected' : ''; ?>>Chevaux</option>
            </select>
        </form> -->

        <!-- Formulaire de recherche d'animaux -->
        <form method="POST" action="src/controller/controllerSearch.php">
            <input type="text" class="form-control w-100" name="search" placeholder="Rechercher un animal..." value="">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <?php
    // Affichage du nombre d'animaux trouvés
    echo "<h2 class='text-center mt-3 heading-style'>
    Nombre d'animaux dans la liste : " . count(isset($_GET['requete']) ? $_SESSION['list'] : $animaux) . "
    </h2>";

    // Vérification si une recherche a été effectuée
    if (isset($_GET['requete'])) {
        // Affichage des résultats de la recherche
        $animauxModel->afficherCartesAnimaux($_SESSION['list']);
    } else {
        // Affichage de tous les animaux assignés
        $animauxModel->afficherCartesAnimaux($animaux);
    }
    ?>
</main>

<?php
require_once(dirname(__DIR__,1).'/model/Animaux.php');
$animauxModel = new Animaux;
$animaux = $animauxModel->getAllAnimaux();

?>
<style>
        .card {
            max-width: 250px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

<main class="container mt-5">
    <h1 class="text-center mb-4">Bienvenue au refuge pour animaux</h1>
    <form method="POST" action="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <input type="text" class="form-control w-50" name="search" placeholder="Rechercher un animal..." value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            <select class="form-control ml-3" name="species" onchange="this.form.submit()">
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
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <?php
        afficherCartesAnimaux($animaux); // Appel de la fonction pour afficher les cartes    
    ?>
</main>

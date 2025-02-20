<<<<<<< HEAD
<?php
require_once (dirname(__DIR__,1).'/model/Model.php');?>
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
        <div class="mb-4">
            <select class="form-control" id="speciesSelect" onchange="filterCards()">
                <option value="all">Toutes les espèces</option>
                <option value="chien">Chiens</option>
                <option value="giraffe">Giraffes</option>
                <option value="elephant">Éléphants</option>
                <option value="crocodile">Crocodiles</option>
                <option value="serpent">Serpents</option>
                <option value="loup">Loups</option>
                <option value="chat">Chats</option>
                <option value="ane">Ânes</option>
                <option value="mulet">Mulets</option>
                <option value="cheval">Chevaux</option>
            </select>
        </div>
        <?php
            afficherCartesAnimaux($animaux); // Appel de la fonction pour afficher les cartes
        ?>
        
    </main>
=======
        <?php
        require_once(dirname(__DIR__,1).'/model/Animaux.php');
        require_once(dirname(__DIR__,1).'/model/Model.php');
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Formulaire de sélection des espèces -->
                <form method="POST" action="">
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
                </form>
            <!-- Formulaire de recherche -->
            <form method="POST" action="src/controller/controllerSearch.php">
                <input type="text" class="form-control w-100" name="search" placeholder="Rechercher un animal..." value="">
                <button type="submit">Rechercher</button>
            </form>
            </div>
            <?php
            if(isset($_GET['requete'])){
                $animauxModel->afficherCartesAnimaux($_SESSION['list']);
            }else{
                $animauxModel->afficherCartesAnimaux($animaux);// Appel de la fonction pour afficher les cartes   
                    // afficherCartesAnimaux($animaux);  
            }
            ?>
        </main>

>>>>>>> 6c7568639d47a27c5bfc29fd0b4858d0f46ac748

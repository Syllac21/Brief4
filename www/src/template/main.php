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

                .heading-style:hover {
                    color: #ff6600;
                    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
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



            
            echo "<h2 class='text-center mt-3 heading-style'>
            Nombre d'animaux dans la liste : " . count(isset($_GET['requete']) ? $_SESSION['list'] : $animaux) . "
            </h2>";
            if(isset($_GET['requete'])){
                $animauxModel->afficherCartesAnimaux($_SESSION['list']);
            }else{
                $animauxModel->afficherCartesAnimaux($animaux);
            }
            



            if(isset($_GET['requete'])){
                $animauxModel->afficherCartesAnimaux($_SESSION['list']);
            }else{
                $animauxModel->afficherCartesAnimaux($animaux);// Appel de la fonction pour afficher les cartes   
                    // afficherCartesAnimaux($animaux);  
            }
            ?>
        </main>


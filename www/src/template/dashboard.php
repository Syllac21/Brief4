<?php
echo '<link rel="stylesheet" href="style/dashboard.css">';
?>


<!-- Barre latérale contenant les liens de navigation -->
<aside class="sidebar pt-5">
    <a class="btn btn-outline-light" href="/?page=dashboard">Accueil dashboard</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=cage">Gestion des Cages</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=animaux">Gestion des Animaux</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=personnel">Gestion des Personnes</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=espece">Gestion des Espèces</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=log">Log</a>
</aside>

<!-- Conteneur principal qui affiche le contenu en fonction de la page sélectionnée -->
<div class="content-wrapper">
    <div class="content">
        <div class="container mt-4">
            <!-- Inclusion dynamique des fichiers PHP selon la valeur de "table" dans l'URL -->
            <div class="container mt-4">
                <?php
                // Vérifie si un paramètre "table" est passé dans l'URL
                if (isset($_GET['table'])) {
                    switch ($_GET['table']) {
                        case 'cage':
                            // Inclusion du fichier qui affiche les cages
                            include "tableCage.php";
                            break;
                        case 'animaux':
                            // Si un ID est fourni, afficher un animal spécifique, sinon afficher la liste complète
                            if (isset($_GET['id'])) {
                                include "oneAnimal.php";
                            } else {
                                include "tableanimal.php";
                            }
                            break;
                        case 'personnel':
                            // Inclusion du fichier pour la gestion du personnel
                            include "tablePersonnel.php";
                            break;
                        case 'espece':
                            // Inclusion du fichier pour la gestion des espèces
                            include "tableEspece.php";
                            break;
                        case 'animal':
                            // Inclusion du fichier pour afficher un animal spécifique
                            include "oneAnimal.php";
                            break;
                        case 'employe':
                            // Inclusion du fichier pour afficher un employé spécifique
                            include "employe.php";
                            break;
                            case 'ajoutEmploye':
                                include "ajoutEmploye.php";
                                break;
                        case 'log':
                            include "tableLog.php";
                            break;
                        default:
                            // Si la valeur de "table" ne correspond à aucun cas, redirige vers la déconnexion
                            // header('Location: /controller/logout.php');
                            echo "Erreur : table inconnue";
                            break;
                    }
                } else {
                    // Si aucun paramètre "table" n'est passé, inclut la page par défaut
                    include "occupation.php";
                }
                ?>
            </div>
        </div>
    </div>
</div>

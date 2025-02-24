<style>
    .btn {
        margin-top: 20px;
        background: green;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #343a40;
        padding-top: 20px;
    }

    .sidebar .btn {
        width: 100%;
        margin-bottom: 15px;
    }

    .content-wrapper {
        margin-left: 250px;
        padding: 20px;
    }

    nav {
        color: white;
    }
</style>

<aside class="sidebar pt-5">
    <a class="btn btn-outline-light" href="/?page=dashboard">Accueil dashboard</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=cage">Gestion des Cages</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=animaux">Gestion des Animaux</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=personnel">Gestion des Personnes</a>
    <a class="btn btn-outline-light" href="/?page=dashboard&table=espece">Gestion des Espèce</a>
</aside>

<div class="content-wrapper">
    <div class="content">
        <div class="container mt-4">
            <!-- Users Table -->
            <div class="container mt-4">
                <?php
                if (isset($_GET['table'])) {
                    switch ($_GET['table']) {
                        case 'cage':
                            include "tableCage.php";
                            break;
                        case 'animaux':
                            if(isset($_GET['id'])){
                                include "oneAnimal.php";
                            }else{
                            include "tableanimal.php";
                            };
                            break;
                        case 'personnel':
                            include "tablePersonnel.php";
                            break;
                        case 'espece':
                            include "tableEspece.php";
                            break;
                        case 'animal':
                            include "oneAnimal.php";
                            break;
                        case 'employe':
                            include "employe.php";
                            break;
                        default:
                            header('Location: /controller/logout.php');
                            break;
                    }
                } else {
                    include "occupation.php";
                }
                ?>
            </div>
        </div>
    </div>
</div>
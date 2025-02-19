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
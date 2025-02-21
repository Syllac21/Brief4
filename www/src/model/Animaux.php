<?php
require_once 'Model.php';
// require_once 'src/model/Animaux.php';

class Animaux
{
    // Cette méthode récupère tous les animaux de la base de données
    public function getAllAnimaux()
    {
        // Connexion à la base de données
        $pdo = dbConnect();

        // Requête SQL pour sélectionner les colonnes nom, genre et description de la table animal
        $requete = $pdo->query("SELECT * FROM animal");

        // Retourne les résultats sous forme de tableau associatif
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

    function afficherCartesAnimaux($animaux)
    {
    echo '<div class="container mt-4">';
    echo '<div class="row">';
    
    foreach ($animaux as $animal) {
        echo '<div class="col-md-4 mb-4 d-flex justify-content-center">';
        echo '<div class="card">';
        echo '<img src="https://images8.alphacoders.com/873/873630.jpg" class="card-img-top" alt="' . htmlspecialchars($animal['nom']) . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($animal['nom']) . '</h5>';
        echo '<p class="card-text"><strong>Sexe :</strong> ' . htmlspecialchars($animal['genre']) . '</p>';
        echo '<p class="card-text">' . htmlspecialchars($animal['description']) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

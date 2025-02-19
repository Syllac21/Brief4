<?php
require_once 'src/model/Model.php';

class Animaux
{
    public function getAllAnimaux()
    {
        $pdo = dbConnect();
        $requete = $pdo->query("SELECT nom, sexe, description FROM animal");
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
        echo '<p class="card-text"><strong>Sexe :</strong> ' . htmlspecialchars($animal['sexe']) . '</p>';
        echo '<p class="card-text">' . htmlspecialchars($animal['description']) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

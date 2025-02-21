<?php
require_once 'src/model/Model.php';

class Animaux
{
    // 🔹 Récupérer TOUS les animaux (ancienne méthode, si besoin)
    public function getAllAnimaux()
    {
        $pdo = dbConnect();
        $requete = $pdo->query("SELECT nom, genre, description FROM animal");
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Récupérer SEULEMENT les animaux de la page demandée
    public function getPaginatedAnimaux($limit, $offset)
    {
        $pdo = dbConnect();
        $sql = "SELECT nom, genre, description FROM animal LIMIT :limit OFFSET :offset";
        $requete = $pdo->prepare($sql);
        $requete->bindValue(':limit', $limit, PDO::PARAM_INT);
        $requete->bindValue(':offset', $offset, PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Récupérer le nombre total d'animaux pour la pagination
    public function getTotalAnimaux()
    {
        $pdo = dbConnect();
        $sql = "SELECT COUNT(*) as total FROM animal";
        $requete = $pdo->query($sql);
        return $requete->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

// 🔹 Fonction pour afficher les cartes des animaux
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
        echo '<p class="card-text"><strong>Sexe :</strong> ' . htmlspecialchars($animal['genre']) . '</p>'; // Correction "sexe" -> "genre"
        echo '<p class="card-text">' . htmlspecialchars($animal['description']) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

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
        $requete = $pdo->query("SELECT nom, genre, description FROM animal");

        // Retourne les résultats sous forme de tableau associatif
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
    // Cette fonction affiche les cartes des animaux passés en argument
    public function afficherCartesAnimaux($animaux)
    {
        // Début du conteneur principal
        echo '<div class="container mt-4">';
        echo '<div class="row">';
    
        // Boucle à travers chaque animal et crée une carte
        foreach ($animaux as $animal) {
            echo '<div class="col-md-4 mb-4 d-flex justify-content-center">';
            echo '<div class="card">';
    
            // Image de l'animal avec un lien fixe (à remplacer par une URL dynamique si nécessaire)
            echo '<img src="https://images8.alphacoders.com/873/873630.jpg" class="card-img-top" alt="' . htmlspecialchars($animal['nom']) . '">';
    
            // Corps de la carte avec le nom, le genre et la description de l'animal
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($animal['nom']) . '</h5>';
            echo '<p class="card-text"><strong>Sexe :</strong> ' . htmlspecialchars($animal['genre']) . '</p>';
            echo '<p class="card-text">' . htmlspecialchars($animal['description']) . '</p>';
            echo '</div>'; // Fin du corps de la carte
            echo '</div>'; // Fin de la carte
            echo '</div>'; // Fin de la colonne
        }
            echo '</div>'; // Fin de la ligne
            echo '</div>'; // Fin du conteneur principal
    }

    // fonction pour récupérer les animaux dont le nom contient le texte en paramètre
    public function searchAnimaux($search, $species = 'all')
    {
        $pdo = dbConnect();
        $sql = "SELECT * FROM animal WHERE nom LIKE ?";
        $params = ["%$search%"];
        if ($species != 'all') {
            $sql .= " AND espece = ?";
            $params[] = $species;
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}
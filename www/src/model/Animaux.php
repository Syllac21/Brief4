<?php
require_once 'Model.php'; // Inclut le fichier Model.php
require_once (dirname(__DIR__,1).'/controller/controlleranimal.php');// Inclut le fichier conreolleranimal.php
class Animaux
{
    // Cette méthode récupère tous les animaux de la base de données
    public function getAllAnimaux()
    {
        // Connexion à la base de données
        $pdo = dbConnect();

        // Requête SQL pour sélectionner tous les enregistrements de la table animal
        $requete = $pdo->query("SELECT * FROM animal WHERE isArchived = 0");

        // Retourne les résultats sous forme de tableau associatif
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode récupère le nombre total d'animaux
    public function getTotalAnimaux()
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        $sql = "SELECT COUNT(*) as total FROM animal WHERE isArchived = 0";
        $requete = $pdo->query($sql);

        // Retourne le nombre total d'animaux
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
            $espece = $this->getSpeciesById($animal['id_animal']);
            echo '<div class="col-md-4 mb-4 d-flex justify-content-center">';
            echo '<div class="card">';
    
            // Image de l'animal avec un lien fixe (à remplacer par une URL dynamique si nécessaire)
            echo '<img src='.$animal['image'] . ' class="card-img-top" alt="' . htmlspecialchars($animal['nom']) . '">';
            
            // Corps de la carte avec le nom, le genre et la description de l'animal
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($animal['nom']) . '</h5>';
            foreach($espece as $especes){
                echo '<p class="card-text"><strong>Espece :</strong> ' . htmlspecialchars($especes['nom']) . '</p>';
            }
            echo '<p class="card-text"><strong>Sexe :</strong> ' . htmlspecialchars($animal['genre']) . '</p>';
            echo '<p class="card-text">' . htmlspecialchars($animal['description']) . '</p>';
            echo '</div>'; // Fin du corps de la carte
            echo '</div>'; // Fin de la carte
            echo '</div>'; // Fin de la colonne
        }

        echo '</div>'; // Fin de la ligne
        echo '</div>'; // Fin du conteneur principal
    }

    // Cette fonction recherche les animaux dont le nom contient le texte passé en paramètre
    public function searchAnimaux($search, $species = 'all')
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        $sql = "SELECT * FROM animal WHERE nom LIKE ?";
        $params = ["%$search%"];

        // Ajoute une condition pour filtrer par espèce si ce n'est pas 'all'
        if ($species != 'all') {
            $sql .= " AND espece = ?";
            $params[] = $species;
        }

        // Prépare et exécute la requête avec les paramètres
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // Retourne les résultats sous forme de tableau associatif
        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    // Cette méthode récupère les animaux assignés à un personnel donné
    public function getAnimauxByPersonnel($id_personnel)
    {
        // Connexion à la base de données
        $pdo = dbConnect();

        // Requête SQL pour récupérer les animaux assignés au personnel
        $sql = "SELECT *
                FROM animal a
                JOIN s_occuper s ON a.id_animal = s.id_animal
                WHERE s.id_personnel = :id_personnel AND a.isArchived = 0";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_personnel' => $id_personnel]);

        // Retourne les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode récupère un animal et ses soigneurs en fonction de son id
    public function getAnimalById($id)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Requête SQL pour récupérer l'animal et ses soigneurs
            $sql = "SELECT a.nom, a.genre, a.image, a.date_naissance, a.numero, p.nom nomSoigneur, p.prenom 
                    FROM animal a 
                    JOIN s_occuper so ON a.id_animal = so.id_animal 
                    JOIN personnel p ON so.id_personnel = p.id_personnel 
                    WHERE a.id_animal = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de la récupération de l'animal: " . $e->getMessage();
        }

        // Retourne les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode récupère l'espèce d'un animal en fonction de son id
    public function getSpeciesById($id)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Requête SQL pour récupérer l'espèce de l'animal
            $sql = "SELECT a.id_animal, e.nom 
                    FROM animal a 
                    JOIN animal_espece ae ON a.id_animal = ae.id_animal 
                    JOIN espece e ON ae.id_espece = e.id_espece 
                    WHERE a.id_animal = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de la récupération de l'espèce: " . $e->getMessage();
        }

        // Retourne les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode récupère les animaux paginés avec des options de tri
    public function getPaginatedAnimaux($limit, $offset, $sort, $order)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        $query = "SELECT * FROM animal WHERE isArchived = 0 ORDER BY $sort $order LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($query);

        // Liaison des paramètres de limite et d'offset
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Retourne les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode permet de modifier le soigneur d'un animal
    public function updateSoigneur($id_animal, $id_personnel)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Requête SQL pour mettre à jour le soigneur de l'animal
            $sql = "INSERT INTO s_occuper (id_animal, id_personnel) VALUES (:id_animal, :id_personnel)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_animal' => $id_animal, 'id_personnel' => $id_personnel]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            return "Erreur lors de la mise à jour du soigneur: " . $e->getMessage();
        }
    }

    // supprimer le lien s_occuper entre le soigneur et l'animal
    public function removeSoigneur($id_animal, $id_personnel)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Requête SQL pour supprimer le lien entre le soigneur et l'animal
            $sql = "DELETE FROM s_occuper WHERE id_animal = :id_animal AND id_personnel = :id_personnel";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                ['id_animal' => $id_animal,
                'id_personnel' => $id_personnel]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            return "Erreur lors de la suppression du soigneur: " . $e->getMessage();
        }
    }

    public function updateResp($idAnimal, $idPersonnel)
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Requête SQL pour mettre à jour le soigneur de l'animal
            $sql = "UPDATE animal a SET a.id_responsable = :id_personnel WHERE a.id_animal = :id_animal";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_animal' => $idAnimal, 'id_personnel' => $idPersonnel]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            return "Erreur lors de la mise à jour du soigneur: " . $e->getMessage();
        }
    }	



    
}

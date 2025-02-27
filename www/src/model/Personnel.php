<?php
// Inclusion du fichier 'Model.php' qui contient probablement la fonction de connexion à la base de données
require_once 'Model.php';

class Personnel
{
    /**
     * Méthode pour récupérer tous les membres du personnel depuis la base de données
     * @return array Retourne un tableau contenant toutes les entrées de la table 'personnel'
     */
    public function getAllPersonnel()
    {
        try { 
            // Connexion à la base de données
            $mysqlClient = dbConnect();
            
            // Préparation de la requête SQL pour sélectionner tous les membres du personnel
            $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE IsArchived = 0');
            
            // Exécution de la requête SQL
            $personnelStatement->execute();
            
            // Récupération des résultats sous forme de tableau associatif
            $personnels = $personnelStatement->fetchAll();

            // Retourne la liste des membres du personnel
            return $personnels;
        } catch (Exception $exception) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête l'exécution du script
            die('Erreur : ' . $exception->getMessage());
        }
    }

    /**
     * Méthode permettant de vérifier l'authentification d'un membre du personnel
     * @param string $login Nom d'utilisateur
     * @param string $password Mot de passe
     * @return array|false Retourne les informations du personnel si authentifié, sinon false
     */
    public function loginPersonnel($login, $password)
    {
        try {
            // Connexion à la base de données
            $mysqlClient = dbConnect();
            
            // Préparation de la requête SQL pour vérifier les identifiants de connexion
            $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE login = :login AND mot_de_passe = :password AND IsArchived = 0');
            
            // Liaison des paramètres sécurisée pour éviter les injections SQL
            $personnelStatement->bindParam(':login', $login);
            $personnelStatement->bindParam(':password', $password);
            
            // Exécution de la requête
            $personnelStatement->execute();
            
            // Récupération des informations du personnel si les identifiants sont valides
            $personnel = $personnelStatement->fetch();

            return $personnel;
        } catch (Exception $exception) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête l'exécution du script
            die('Erreur : ' . $exception->getMessage());
        }
    }

    /**
     * Méthode pour récupérer un membre du personnel en fonction de son identifiant
     * @param int $id Identifiant unique du personnel
     * @return array|false Retourne les informations du personnel ou false si non trouvé
     */
    public function getPersonnelById($id)
    {
        try {
            // Connexion à la base de données
            $mysqlClient = dbConnect();
            
            // Préparation de la requête SQL pour récupérer un membre du personnel par son ID
            $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE id_personnel = :id');
            
            // Liaison du paramètre sécurisé
            $personnelStatement->bindParam(':id', $id);
            
            // Exécution de la requête
            $personnelStatement->execute();
            
            // Récupération des informations du personnel correspondant à l'ID donné
            $personnel = $personnelStatement->fetch();

            return $personnel;
        } catch (Exception $exception) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête l'exécution du script
            die('Erreur : ' . $exception->getMessage());
        }
    }
}

<?php
// Inclusion du fichier 'Model.php' qui contient probablement la fonction de connexion à la base de données
require_once 'Model.php';

class Espece
{
    /**
     * Méthode pour récupérer toutes les espèces depuis la base de données
     * @return array Retourne un tableau contenant toutes les espèces
     */
    public function getAllEspeces()
    {
        try { 
            // Connexion à la base de données via la fonction dbConnect() définie dans 'Model.php'
            $pdo = dbConnect();
            
            // Préparation de la requête SQL pour sélectionner toutes les espèces
            $especesStatement = $pdo->prepare('SELECT * FROM espece');
            
            // Exécution de la requête SQL
            $especesStatement->execute();
            
            // Récupération des résultats sous forme de tableau associatif
            $especes = $especesStatement->fetchAll();

            // Retourne les espèces récupérées
            return $especes;
        } catch (Exception $exception) {
            // En cas d'erreur, on arrête l'exécution et on affiche un message d'erreur
            die('Erreur : ' . $exception->getMessage());
        }
    }
}

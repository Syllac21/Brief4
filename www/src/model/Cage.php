<?php
require_once 'Model.php'; // Inclut le fichier Model.php

class Cage
{
    // Fonction pour récupérer toutes les cages de la base de données
    public function getAllCages()
    {
        
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Exécute la requête pour sélectionner toutes les cages
            $query = $pdo->query("SELECT * FROM cage");

            // Retourne les résultats sous forme de tableau associatif
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas d'exception
            echo $e->getMessage();
            return [];
        }

    }


    // Fonction pour compter le nombre total de cages
    public function countCages()
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Exécute la requête pour compter le nombre total de cages
            $query = $pdo->query("SELECT COUNT(*) FROM cage");

            // Retourne le résultat
            return $query->fetch();
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas d'exception
            echo $e->getMessage();
            return [];
        }
    }

    // Fonction pour compter le nombre de cages occupées
    public function countCagesOccupied()
    {
        // Connexion à la base de données
        $pdo = dbConnect();
        try {
            // Exécute la requête pour compter le nombre de cages occupées
            $query = $pdo->query("SELECT COUNT(DISTINCT(id_cage)) from animal;");

            // Retourne le résultat
            return $query->fetch();
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas d'exception
            echo $e->getMessage();
            return [];
        }
    }

    // Fonction pour ajouter une cage
    public function addCage($postdata){
        $pdo = dbConnect();
        try {
            // Exécute la requête pour ajouter une cage
            $query = $pdo->prepare("INSERT INTO cage (numero, allee, salle) VALUES (:numero, :allee, :salle)");
            $query->execute([
                'numero' => $postdata['numero'],
                'allee' => $postdata['allee'],
                'salle' => $postdata['salle']
            ]);
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas d'exception
            echo $e->getMessage();
            return [];
        }
    }
}

<?php

require_once 'Model.php';

class Log
{
    // Méthode pour obtenir tous les logs
    public function getAllLogs()
    {
        try {
            // Connexion à la base de données via la fonction dbConnect() définie dans 'Model.php'
            $pdo = dbConnect();

            // Préparation de la requête SQL pour sélectionner tous les logs
            $logsStatement = $pdo->prepare('SELECT * FROM Logs');
            $logsStatement->execute();
            $logs = $logsStatement->fetchAll();
            return $logs;
        } catch (Exception $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
    }

    // Méthode pour ajouter un nouveau log
    public function addLog($nom, $action, $id_personnel)
    {
        try {
            $pdo = dbConnect();
    
            // Préparation de la requête SQL pour insérer un nouveau log
            $addLogStatement = $pdo->prepare('INSERT INTO Logs (nom, action, id_personnel) VALUES (:nom, :action, :id_personnel)');
            $addLogStatement->bindParam(':nom', $nom); // Lie le paramètre :nom avec la variable $nom
            $addLogStatement->bindParam(':action', $action); // Lie le paramètre :action avec la variable $action
            $addLogStatement->bindParam(':id_personnel', $id_personnel, PDO::PARAM_INT); // Lie le paramètre :id_personnel avec la variable $id_personnel
    
            // Exécution de la requête
            $addLogStatement->execute();
        } catch (Exception $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
    }
    
    
}
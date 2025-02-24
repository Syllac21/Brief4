<?php
require_once 'Model.php';
class Cage

{
    // Function to get all cages from the database
    public function getAllCages()
    {
        $pdo = dbConnect();
        try {
            $query = $pdo->query("SELECT * FROM cage");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    // function pour compter le nombre de cages 
    public function countCages()
    {
        $pdo = dbConnect();
        try {
            $query = $pdo->query("SELECT COUNT(*) FROM cage");
            return $query->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    // function pour compter le nombre de cages occupées
    public function countCagesOccupied()
    {
        $pdo = dbConnect();
        try {
            $query = $pdo->query("SELECT COUNT(DISTINCT(id_cage)) from animal;");
            return $query->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
}
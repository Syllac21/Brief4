<?php
require_once 'Model.php';
class Cage

{
    private $pdo;

    // Constructor: Connect to the database
    // public function __construct()
    // {
    //     try {
    //         $this->pdo = new PDO("mysql:host=localhost;dbname=ZooDB", "root", "");
    //         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch (PDOException $e) {
    //         die("Database connection failed: " . $e->getMessage());
    //     }
    // }

    // Function to get all cages from the database
    public function getAllCages()
    {
        $pdo = dbConnect();
        $query = $pdo->query("SELECT * FROM cage");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Create an instance and display cages
$cage = new Cage();

?>
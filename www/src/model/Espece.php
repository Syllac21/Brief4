<?php
require_once 'Model.php';

class Espece
{
    public function getAllEspeces()
    {
       try{ 
        $pdo=dbConnect();
        $especesStatement = $pdo->prepare('SELECT * FROM espece');
        $especesStatement->execute();
        $especes=$especesStatement->fetchAll();

        return $especes;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    
    }
}
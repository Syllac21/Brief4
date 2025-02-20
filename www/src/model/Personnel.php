<?php
require_once 'Model.php';
class Personnel
{
    public function getAllPersonnel()
    {
       try{ 
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel');
        $personnelStatement->execute();
        $personnels=$personnelStatement->fetchAll();

        return $personnels;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    
    }

    public function loginPersonnel($login, $password)
    {
        try{
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE login = :login AND mot_de_passe = :password');
        $personnelStatement->bindParam(':login', $login);
        $personnelStatement->bindParam(':password', $password);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    }

    public function getPersonnelById($id)
    {
        try{
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE id = :id');
        $personnelStatement->bindParam(':id', $id);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    }
}
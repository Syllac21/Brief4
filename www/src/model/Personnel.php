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
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE id_personnel = :id');
        $personnelStatement->bindParam(':id', $id);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    }


 // Connect to the database
public function ajoutPersonnel($post)

{
    $pdo = dbConnect();

    try{
        $stmt = $pdo->prepare('
            INSERT INTO personnel(nom, prenom, poste, mot_de_passe, login)
            VALUES(:nom,:prenom,:poste,:password,:login)'
        );
        $stmt->bindParam(':nom',               $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom',            $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':poste',             $_POST['poste'], PDO::PARAM_STR);
        $stmt->bindParam(':password',          $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(':login',             $_POST['login'], PDO::PARAM_STR);
        $stmt->execute();
        // $success = true;
        // echo "success";
    } catch(PDOException $e) {
            echo 'Erreur lors de l\'insertion: ' . $e->getMessage();
    }

}

}